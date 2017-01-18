<?php
/**
 * Client Side webservices for user data history
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Wilson da Silva Moura (mourawil@paho.org)
 * @copyright   BIREME/OPAS/OMS
 *
 */

/*
 * Edit this file in UTF-8 - Test String "áéíóú"
 */
class Tracking {

    private static function getSoapClient(){
        return new SoapClient(null,array('location'=>SERVICES_PLATFORM_SERVER.'/Tracking.php',
                                           'uri'=>'http://test-uri/'));
    }

    /**
     * Return a data history list from a specific user.
     * @param string $userTK user hash
     * @param array $params array([date,rate])
     * @return false|array record set with user data history
     */
    public static function getTraceList($userTK, $params){
        $retValue = false;

        try{
            $objSoapClient = self::getSoapClient();
            $retValue = $objSoapClient->getTraceList($userTK,$params);
        }catch(Exception $e){
            $logger = &Log::singleton('file', LOG_FILE, __CLASS__, $_conf);
            $logger->log($e->getMessage(),PEAR_LOG_EMERG);
        }

        return $retValue;
    }

}
?>