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
        $this->_data = Token::unmakeUserTK($userTK);
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

        $count = ( $params["widget"] ) ? WIDGETS_ITEMS_LIMIT : DOCUMENTS_PER_PAGE;
        $from = $count * $params["page"];

        if($userID){
            $data = array();
            $client = new MongoDB\Client(MONGODB_SERVER);
            $collection = $client->servicesplatform->logs;
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

            foreach ($result as $entry)
                $data[] = $entry;

            if (count($data) !== 0 )
                $retValue = $data;
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