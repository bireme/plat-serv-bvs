<?php
/**
 * Document DAO Class
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Fabio Batalha C. Santos (fabio.santos@bireme.org)
 * @author      Gustavo Fonseca (gustavo.fonseca@bireme.org)
 * @copyright   BIREME
 *
 */

/*
 * Edit this file in UTF-8 - Test String "áéíóú"
 */

require_once(dirname(__FILE__).'/../include/DAO.inc.php');
require_once(dirname(__FILE__)."/Document.php");

/**
 * DocumentDAO class
 */
class DocumentDAO {

    /**
     * Add a new document. if exists, return the existing document
     *
     * @param object $document
     * @return mixed
     */
	public static function addDoc($document){
        
        $result = false;
        
        if(!self::documentExists($document)){

            $strsql = "INSERT INTO documents (
            docID,
            srcID,
            docURL,
            title,
            serial,
            volume,
            number,
            suppl,
            year,
            authors,
            keywords,
            process_date,
            publication_date
            )
            VALUES ('".$document->getDocID()."','"
            .$document->getSrcID()."','"
            .$document->getDocURL()."','"
            .$document->getDocTitle()."','"
            .$document->getSerial()."','"
            .$document->getVolume()."','"
            .$document->getNumber()."','"
            .$document->getSuppl()."','"
            .$document->getYear()."','"
            //.mysqli_escape_string($document->getAuthors())."','"
            .$document->getAuthors()."','"
            //.mysqli_escape_string(str_replace("'","&apos;",$document->getKeywords()))."','"
            .str_replace("'","&apos;",$document->getKeywords())."','"
            .date('Y-m-d H:i:s')."','"
            .$document->getPublicationDate()."'"
            .")";

            try{
                $_db = new DBClass();
                $result = $_db->databaseExecInsert($strsql);
            }catch(DBClassException $e){
                $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
                $logger->log($e->getMessage(),PEAR_LOG_EMERG);
            }

        }

        $result = self::getDoc($document->getDocID(),$document->getSrcID());

		return $result;
	}

    /**
     * Get the user profile data from the database
     *
     * @param $userId
     * @return array of UserProfile objects
     */
	public static function getDoc($docID,$srcID){
        $retValue = false;

        $strsql = "SELECT * FROM  documents
                   WHERE docID = '".$docID."' and srcID='".$srcID."'";

        try{
            $_db = new DBClass();
            $arr = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        if(isset($arr[0]['docID'])){
            $retValue = new document();
            $retValue->setDocID($arr[0]['docID']);
            $retValue->setSrcID($arr[0]['srcID']);
            $retValue->setDocTitle($arr[0]['title']);
            $retValue->setSerial($arr[0]['serial']);
            $retValue->setVolume($arr[0]['volume']);
            $retValue->setNumber($arr[0]['number']);
            $retValue->setSuppl($arr[0]['suppl']);
            $retValue->setYear($arr[0]['year']);
            $retValue->setDocURL($arr[0]['docURL']);
            $retValue->setAuthors($arr[0]['authors']);
            $retValue->setKeywords($arr[0]['keywords']);
        }
		
		return $retValue;
	}

    /**
     * Get an array of document objects from an XML string
     *
     * @param string $xmlDoc
     * @return mixed
     */
    public static function getDocsFromXML($xmlDoc){
        $retValue = false;

        /* load simpleXML object */
        $xml = simplexml_load_string($xmlDoc);
        
        if($xml){
            /* array of document objects */
            $arrObjDocument = array();

            foreach($xml->doc as $docElem){
                /* instantiate a new document object */
                $objDocument = new Document();

                foreach($docElem->field as $fieldOcc){                    
                    switch((string)$fieldOcc['name']){
                        case 'doc_id':
                            $objDocument->setDocID((string)$fieldOcc);
                            break;
                        case 'src_id':
                            $objDocument->setSrcID((string)$fieldOcc);
                            break;
                        case 'au':
                            $objDocument->setAuthors((string)$fieldOcc);
                            break;
                        case 'title':                            
                            $objDocument->setDocTitle((string)$fieldOcc);
                            break;
                        case 'ser':
                            $objDocument->setSerial((string)$fieldOcc);
                            break;
                        case 'kw':
                            $objDocument->setKeywords((string)$fieldOcc);
                            break;
                        case 'year':
                            $objDocument->setYear((string)$fieldOcc);
                            break;
                        case 'num':
                            $objDocument->setNumber((string)$fieldOcc);
                            break;
                        case 'vol':
                            $objDocument->setVolume((string)$fieldOcc);
                            break;
                        case 'suppl':
                            $objDocument->setSuppl((string)$fieldOcc);
                            break;
                        case 'pub_dt':
                            $objDocument->setPublicationDate((string)$fieldOcc);
                            break;
                        case 'doc_url':
                            $objDocument->setDocURL((string)$fieldOcc);
                            break;
                    }                    
                }
                /* append the document object array */                
                $arrObjDocument[] = $objDocument;
                unset($objDocument);
            }
            $retValue = $arrObjDocument;
        }
        return $retValue;
    }

    /**
     * check if the document exists
     *
     * @param object $document
     * @return boolean
     */
    public static function documentExists($document){
        $retValue = false;
        
		$strsql = "SELECT * FROM  documents 
                   WHERE docID = '".$document->getDocID()."' and
                         srcID='".$document->getSrcID()."'";

        try{
            $_db = new DBClass();
            $arr = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        if(count($arr) != 0){
            $retValue = true;
        }
        
        return $retValue;
    }

    /**
     * Get the total count of documents
     *
     * @param string $filter Filter by docID
     * @return integer
     */
    public static function getDocsCount($filter=null){
        $retValue = false;

        $strsql = "SELECT count(*) as total FROM documents";

        if(!empty($filter)){
            $strsql .= " WHERE docID " . $filter . ";";
        }else{
            $strsql .=";";
        }

        try{
            $_db = new DBClass();
            $res = $_db->databaseQuery($strsql);
        }catch(DBClassException $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        if($res[0]['total'] >= 0){
            $retValue =$res[0]['total'];
        }

        return $retValue;
    }

}
?>