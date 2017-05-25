<?php
/**
 * Data verifier class
 *
 * Contains specific methods for verifying data consistency
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Gustavo Fonseca (gustavo.fonseca@bireme.org)
 * @copyright   BIREME
 *
 */

/*
 * Edit this file in UTF-8 - Test String "áéíóú"
 */

require_once(dirname(__FILE__).'/Tools.php');
require_once(dirname(__FILE__)."/LDAPAuthenticator.php");
require_once(dirname(__FILE__).'/../config.php');
require_once(dirname(__FILE__)."/User.php");
require_once(dirname(__FILE__)."/UserDAO.php");

class Verifier {

    private $_data = null;

    /**
     * Associative array containing the data to be checked
     *
     * This constructor automatically converts all input parameters to
     * SYS_CHARSET charset
     *
     * @param string $arrParams['userTK'] User token
     * @param int $arrParams['dirID'] Directory ID
     * @param int $arrParams['docID'] Document ID
     * @param int $arrParams['rankValue'] Rank value
     * @param string $arrParams['dirName'] Directory name
     * @param int $arrParams['toDirID'] New directory ID
     * @param string $arrParams['xmlDoc'] Document XML
     * @param string $arrParams['newsXML'] News XML
     * @param int $arrParams['newsID'] News ID
     * @param string $arrParams['linksXML'] Links XML
     * @param string $arrParams['linkID'] Links ID
     * @param string $arrParams['trigramasXML'] Trigramas XML
     */
    public function __construct($arrParams){
        $this->_data = CharTools::eqStrCharsetFromArray($arrParams);
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
     * Check and decrypt the user token
     *
     * @return mixed
     */
    public function chkUserTK(){
        $result = false;
        $retValue = false;
        $userParm = Token::unmakeUserTK($this->_data['userTK'], true);

        if ( 'bireme_accounts' == $userParm['userSource'] ) { /* check if user is from BIREME Acccounts */
            if ( UserDAO::getAccountsUser($userParm['userID'], $userParm['userPass']) )
                $result = true;
        } else {
            $userParm = Token::unmakeUserTK($this->_data['userTK']);

            if ( in_array( $userParm['userSource'], array('facebook', 'google') ) ) { /* check if user is from Social Medias */
                $result = true;
            } elseif ( LDAPAuthenticator::authenticateUser($userParm['userID'],$userParm['userPass']) ) {
                $result = true;
            }
        }

        if ( $result ) {
            $this->_data['userTK'] = $userParm;
            $retValue = true;
        }

        return $retValue;
    }

    /**
     * Check the dirID param
     *
     * @return boolean
     */
    public function chkDirID(){
        $retValue = false;
        
        if( preg_match(REGEXP_INTEGER, $this->_data['dirID'] )){
            $retValue = true;
        }        
        return $retValue;
    }

    /**
     * Check the docID param
     *
     * @return boolean
     */
    public function chkDocID(){
        $retValue = false;
        
        if( preg_match(REGEXP_DOCID, $this->_data['docID'] )){
            $retValue = true;
        }        
        return $retValue;
    }

    /**
     * Check the rankValue param
     *
     * @return boolean
     */
    public function chkRankValue(){
        $retValue = false;
        
        if( preg_match(REGEXP_INTEGER, $this->_data['rankValue'] )){
            $retValue = true;
        }        
        return $retValue;
    }

    /**
     * Check the dirName param
     *
     * @return boolean
     */
    public function chkDirName(){
        $retValue = false;
        
        if( preg_match(REGEXP_DIRNAME, $this->_data['dirName'] )){
            $retValue = true;
        }
        return $retValue;
    }

    /**
     * Validates XML against a predefined XSD
     *
     * @param string $xml XML String
     * @param string $xsd Path to XSD file
     * @return boolean
     */
    public function chkXmlValidation($xml,$xsd){
        $retValue = false;

        $objDOMDocument = new DOMDocument();
        if($objDOMDocument->loadXML($xml)){
            if($objDOMDocument->schemaValidateSource(file_get_contents($xsd))){
                $retValue = true;
            }
        }
        return $retValue;
    }

    /**
     * Verify all parameters
     *
     * @return mixed Array of individual check status
     */
    public function chkAll(){
        $retValue = false;

        if(is_array($this->_data)){            
            /* prepare to receive the output params */
            $retValue = array();

            foreach($this->_data as $key => $item){
                switch($key){
                    case 'userTK':
                        $retValue['userTK']=$this->chkUserTK();
                        break;
                    case 'dirID':
                        $retValue['dirID']=$this->chkDirID();
                        break;
                    case 'rankValue':
                        $retValue['rankValue']=$this->chkRankValue();
                        break;
                    case 'dirName':
                        $retValue['dirName']=$this->chkDirName();
                        break;
                    case 'toDirID':
                        $retValue['toDirID']=$this->chkDirID();
                        break;
                    case 'xmlDoc':
                        $retValue['xmlDoc']=$this->chkXmlValidation($item,XSD_XMLDOC);
                        break;
                    case 'newsXML':
                        $retValue['newsXML']=$this->chkXmlValidation($item,XSD_XMLNEWS);
                        break;
                    case 'linkXML':
                        $retValue['linkXML']=$this->chkXmlValidation($item,XSD_XMLLINKS);
                        break;
                    case 'trigramasXML':
                        $retValue['trigramasXML']=$this->chkXmlValidation($item,XSD_XMLTRIGRAMAS);
                        break;
                    default:
                        break;
                }
            }
        }
        return $retValue;
    }

    /**
     * Check if the flow can continue
     *
     * @return mixed
     */
    public function canPass(){
        $retValue = false;

        if(is_array($this->_data)){
            $retValue = array();

            $retChkAll = $this->chkAll();

            foreach($retChkAll as $key => $item){
                if(!$item){
                    $retValue = false;
                    break;
                }else{
                    $retValue = true;
                }
            }

        }
        return $retValue;
    }


    public static function chkObjUser($objUser){
        $source = $objUser->getSource() ? $objUser->getSource() : '';

        if($objUser->getFirstName()){            
            if(!preg_match(REGEXP_USER_NAME, $objUser->getFirstName())){
                return false;
            }
        }

        if($objUser->getLastName()){
            if(!preg_match(REGEXP_USER_NAME, $objUser->getLastName())){
                return false;
            }
        }

        if($objUser->getGender()){            
            if(!preg_match(REGEXP_USER_GENDER, $objUser->getGender())){
                return false;
            }
        }

        /* check users from BIREME Acccounts */
        if ( empty( $source ) || 'bireme_accounts' != $source ){
            if($objUser->getID()){
                if(!filter_var($objUser->getID(), FILTER_VALIDATE_EMAIL)){
                    return false;
                }
            }
        } else {
            if($objUser->getID()){            
                if(!preg_match(REGEXP_USER_NAME, $objUser->getID())){
                    return false;
                }
            }
        }

        //if($objUser->getPassword()){}

        if($objUser->getEmail()){
            if(!filter_var($objUser->getEmail(), FILTER_VALIDATE_EMAIL)){
                return false;
            }
        }

        if($objUser->getDegree()){            
            if(!preg_match(REGEXP_USER_DEGREE, $objUser->getDegree())){
                return false;
            }
        }

        if($objUser->getAffiliation()){
            if(!preg_match(REGEXP_USER_AFFILIATION, $objUser->getAffiliation())){
                return false;
            }
        }

        if($objUser->getAgreementDate()){            
            if(!preg_match(REGEXP_AGREEMENT_DATE, $objUser->getAgreementDate())){
                return false;
            }
        }

        return true;
    }

}
?>
