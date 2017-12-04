<?php

// Importação do autoload do composer
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/../client/classes/Tools.php';

class MySearches {

    private $_data = null;

    /**
     * Associative array containing the data to be checked
     *
     * This constructor automatically unmake user's token
     *
     * @param string $userTK User's token
     */
    public function __construct($userTK){
        $token = Token::unmakeUserTK($userTK, true);

        if ( 'bireme_accounts' == $token['userSource'] ) {
            $this->_data = $token;
        }
        else {
            $token = Token::unmakeUserTK($userTK);
            $this->_data = $token;
        }

        //self::setCappedCollection('logs');
    }

    /**
    * Get all parameters converted to SYS_CHARSET
    *
    * @return array Same keys of the input params
    */
    public function getParams(){
        return $this->_data;
    }

    /**
    * Create a new capped collection explicitly
    *
    * @param string $name collection name
    * @return object
    */
    public function setCappedCollection($name){
        $capped = false;

        $client = new MongoDB\Client(MONGODB_SERVER);
        $db = $client->servicesplatform;
        $listCollections = $db->listCollections();
        //$iterator = iterator_to_array($listCollections);

        foreach ($listCollections as $collectionInfo) {
            if ( 'logs' == $collectionInfo->getName() ) {
                if ( $collectionInfo->isCapped() ) {
                    $capped = true;
                } else {
                    $capped = false;

                    $collection = $db->logs;
                    $collection->drop();
                }

                break;
            } else {
                $capped = false;
            }
        }

        if ( !$capped ) {
            $collection = $db->createCollection(
                $name,
                array(
                    'capped' => true, // Define tamanho fixo da coleção
                    'size' => 3*1024*1024*1024 // Tamanho da coleção em bytes
                )
            );
        }
    }

    /**
     * Get a list of searches metadata from a specific user
     *
     * @param string $userID user mail
     * @param array $params [sort=>rate|date]
     * @param int $from used by pagination
     * @param int $count used by pagination
     * @return array result set from select query
     *
     */
    public static function getSearchList($userID, $params){
        $retValue = false;

        $count = ( $params["count"] ) ? $params["count"] : DOCUMENTS_PER_PAGE;
        $from = $count * $params["page"];

        if($userID){
            $data = array();
            $client = new MongoDB\Client(MONGODB_SERVER);
            $db = $client->servicesplatform;
            $collection = $db->logs;
            //$distinct = $collection->distinct('query');
/*
            $result = $collection->find(
                array(
                    'userID' => $userID,
                    'query' => array(
                        '$ne' => '*',
                        '$regex' => '^(?!id:)',
                        '$options' => 'i'
                    )
                ),
                array(
                    'limit' => (int) $count,
                    'skip' => $from,
                    'sort' => array( 'date' => -1 )
                )
            );
*/
            $result = $collection->aggregate([
                [
                    '$match' => [
                        'userID' => $userID,
                        'query' => [
                            '$ne' => '*',
                            '$regex' => '^(?!id:)',
                            '$options' => 'i'
                        ],
                        'pub' => [
                            '$ne' => false
                        ]
                    ]
                ],
                [
                    '$group' => [
                        '_id' => [
                            'query' => '$query',
                            'filter' => '$filter'
                        ],
                        'date' => [
                            '$addToSet' => '$date'
                        ]
                    ]
                ],
                [ '$sort' => [ 'date' => -1 ] ],
                [ '$skip' => $from ],
                [ '$limit' => (int) $count ]
            ]);

            foreach ($result as $entry) {
                $query  = $entry->_id->query;
                $filter = $entry->_id->filter;
                $date   = $entry->date;

                $data[] = array(
                    'query'  => $query,
                    'filter' => $filter,
                    'date'   => $date
                );
            }

            if (count($data) !== 0 )
                $retValue = $data;
        }

        return $retValue;
    }

    /**
     * Search stats from a specific user
     *
     * @param string $userID user mail
     * @return array result set from select query
     *
     */
    public static function searchStats($userID){
        $retValue = false;
        $data = array();
        $client = new MongoDB\Client(MONGODB_SERVER);
        $db = $client->servicesplatform;
        $collection = $db->logs;

        $result = $collection->aggregate(array(
            array(
                '$match' => array(
                    'userID' => $userID,
                    'query' => array(
                        '$ne' => '*',
                        '$regex' => '^(?!id:)',
                        '$options' => 'i'
                    ),
                    'pub' => array(
                        '$ne' => false
                    )
                )
            ),
            array(
                '$group' => array(
                    '_id' => array(
                        'userID' => '$userID',
                    ),
                    'searches' => array(
                        '$addToSet' => array(
                            'query' => '$query',
                            'filter' => '$filter',
                            'date' => '$date'
                        ),
                    ),
                    'count' => array( '$sum' => 1 ),
                ),
            ),
            array(
                '$sort' => array( 'count' => -1 ),
            ),
        ));

        foreach ($result as $entry) {
            $userID = $entry->_id->userID;

            $data[$userID] = array(
                'total' => $entry->count,
                'distinct' => count($entry->searches)
            );

            $retValue = $data;
        }

        return $retValue;
    }

    /**
     * Remove old searches metadata from a specific user
     *
     * @param string $userID user mail
     * @return array result set from select query
     *
     */
    public static function removeOldSearches($userID){
        $retValue = false;

        if($userID){
            $params["count"] = MY_SEARCHES_LIMIT + 1;
            $search_list = self::getSearchList($userID, $params);

            if ( count($search_list) > MY_SEARCHES_LIMIT ) {
                array_pop($search_list);
                $end = end($search_list);
                $date = iterator_to_array($end['date']);
                rsort($date);

                $client = new MongoDB\Client(MONGODB_SERVER);
                $db = $client->servicesplatform;
                $collection = $db->logs;

                $result = $collection->deleteMany(
                    array(
                        'userID' => $userID,
                        'date'  => array(
                            '$lt' => $date[0]
                        ),
                        // 'query' => array(
                        //     '$ne' => '*',
                        //     '$regex' => '^(?!id:)',
                        //     '$options' => 'i'
                        // )
                    )
                );

                $retValue = $result->getDeletedCount();
            }
        }

        return $retValue;
    }

    /**
     * Delete searches metadata from a specific user
     *
     * @param string $userID user mail
     * @return array result set from select query
     *
     */
    public static function deleteSearches($userID){
        $retValue = false;

        if($userID){
            $client = new MongoDB\Client(MONGODB_SERVER);
            $db = $client->servicesplatform;
            $collection = $db->logs;

            $result = $collection->deleteMany(
                array(
                    'userID' => $userID
                )
            );

            $retValue = $result->getDeletedCount();
        }

        return $retValue;
    }

    /**
     * Delete query metadata from a specific user
     *
     * @param string $userID user mail
     * @param string $query
     * @param string $filter
     * @return array result set from select query
     *
     */
    public static function deleteQuery($userID, $query, $filter){
        $retValue = false;

        $query = htmlspecialchars($query, ENT_QUOTES);
        $filter = htmlspecialchars($filter, ENT_QUOTES);

        if($userID){
            $client = new MongoDB\Client(MONGODB_SERVER);
            $db = $client->servicesplatform;
            $collection = $db->logs;

            $result = $collection->deleteMany(
                array(
                    'userID' => $userID,
                    'query'  => $query,
                    'filter' => $filter
                )
            );

            $retValue = $result->getDeletedCount();
        }

        return $retValue;
    }

    /**
     * Disable query metadata from a specific user
     *
     * @param string $userID user mail
     * @param string $query
     * @param string $filter
     * @return array result set from select query
     *
     */
    public static function disableQuery($userID, $query, $filter){
        $retValue = false;

        $query = htmlspecialchars($query, ENT_QUOTES);
        $filter = htmlspecialchars($filter, ENT_QUOTES);

        if($userID){
            $client = new MongoDB\Client(MONGODB_SERVER);
            $db = $client->servicesplatform;
            $collection = $db->logs;

            $result = $collection->updateMany(
                array(
                    'userID' => $userID,
                    'query'  => $query,
                    'filter' => $filter
                ),
                array(
                    '$set' => array(
                        'pub' => false
                    )
                )
            );

            $retValue = array();
            $retValue['matched']  = $result->getMatchedCount();
            $retValue['modified'] = $result->getModifiedCount();
        }

        return $retValue;
    }

    /**
     * Get the total number of searches from a specific user
     *
     * @param string $userID user mail
     * @return false|int int > 0
     */
    public static function getTotalItens($userID){
        $retValue = false;

        if($userID){
            $data = array();
            $client = new MongoDB\Client(MONGODB_SERVER);
            $collection = $client->servicesplatform->logs;
/*
            $result = $collection->find(
                array(
                    'userID' => $userID,
                    'query' => array(
                        '$ne' => '*',
                        '$regex' => '^(?!id:)',
                        '$options' => 'i'
                    )
                )
            );
*/
            $result = $collection->aggregate([
                [
                    '$match' => [
                        'userID' => $userID,
                        'query' => [
                            '$ne' => '*',
                            '$regex' => '^(?!id:)',
                            '$options' => 'i'
                        ],
                        'pub' => [
                            '$ne' => false
                        ]
                    ]
                ],
                [
                    '$group' => [
                        '_id' => [
                            'query' => '$query',
                            'filter' => '$filter'
                        ]
                    ]
                ]
            ]);

            foreach ($result as $entry)
                $data[] = $entry;

            $retValue = count($data);
        }

        return $retValue;
    }

    /**
     * Get the total pages from a record set if using pagination. The number of
     * registers per page is configured in the config.php file
     *
     * @param string $userID user mail
     * @param int $itensPerPage
     * @return int
     */
    public static function getTotalPages($userID, $itensPerPage){
        $total = self::getTotalItens($userID);
        return ceil($total/$itensPerPage);
    }

}

?>