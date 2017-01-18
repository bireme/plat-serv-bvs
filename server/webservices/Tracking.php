<?php
/**
 * Server Side webservices for user data history
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Wilson da Silva Moura (mourawil@paho.org)
 * @copyright   BIREME/OPAS/OMS
 *
 */

/*
 * Edit this file in UTF-8 - Test String "áéíóú"
 */
require_once(dirname(__FILE__)."/../classes/Tools.php");
require_once(dirname(__FILE__)."/../classes/Tracking.php");
require_once(dirname(__FILE__)."/../classes/Verifier.php");

/* soapserver object instantiation */
$objSoapServer = new SoapServer(null,array('uri'=>'http://test-uri/'));

/* request handler */
$objSoapServer->addFunction(SOAP_FUNCTIONS_ALL);
$objSoapServer->handle();

/**
 * Return a data history list from a specific user.
 * @param string $userTK user hash
 * @param array $params array([date,rate])
 * @return false|array record set with user data history
 */
function getTraceList($userTK, $args){
    $traceList = false;

    /*  parameter validation */
    $params = array('userTK' => $userTK);
    $objVerifier = new Verifier($params);

    if($retVerifier = $objVerifier->canPass()){
        $retParams = $objVerifier->getParams();        
        $traceList = Tracking::getTraceList($retParams['userTK']['userID'],$args);
    }

    return $traceList;
}
?>
