<?php
/**
 * LDAP Handle Class
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
require_once("Net/LDAP2.php"); /* PEAR Net_LDAP2 API */
require_once(dirname(__FILE__)."/LDAPAuthenticator.php");
/**
 * LDAP Class
 */
class LDAP{

    /**
     * Open a connection with the LDAP server
     *
     * Exception code 601 if the connection fails
     *
     * @return object
     */
    public static function connect($server_config,
        $userName = null, $userPass = null)
    {
        $userName = ($userName != null)?$userName:$server_config["BINDID_LDAP"];
        $binddn = $userName."@".
            $server_config["DOMAIN_LDAP"];        
        $bindpw = ($userPass != null)?$userPass:$server_config["BINDPW_LDAP"];
        $basedn = $server_config["BASEDN_LDAP"];
        $host   = $server_config["SERVER_LDAP"];
        $port   = $server_config["SERVER_PORT"]?$server_config["SERVER_PORT"]:389;

        // The configuration array:
        $config = array (
            'binddn'    => $binddn,
            'bindpw'    => $bindpw,
            'basedn'    => $basedn,
            'host'      => $host,
            'starttls'  => false,
            'version'   => 3,
            'port'      => $port
        );

        // Connecting using the configuration:
        $ldap = Net_LDAP2::connect($config);

        // Testing for connection error
        if (PEAR::isError($ldap)) {
            throw new Exception($ldap->getMessage(), 601);
        }

        return $ldap;
    }

    /**
     * Add a new entry to the directory
     *
     * Exception code 500 if the user already exists, valid credentials
     * Exception code 502 if the user already exists, invalid credentials
     * Exception code 501 if errors adding the entry
     * Exception code 503 if trying to add a BIREME user
     * Exception code 601 if the connection fails
     *
     * @param string $server_config LDAP server configuration
     * @param string $userAttributes String array containing user attributes
     */
    public static function add($server_config, $userAttributes)
    {
        $userDomain = substr(stristr($userAttributes['cn'],'@'),1);

        try{
            $ldap = self::connect($server_config);
        }catch (Exception $e){
            throw $e;
        }

        if(!$ldap){
            throw new Exception($ldap->getMessage(), 601);
        }

        $dn = 'CN=' . $userAttributes['cn'] . ',' .
            $server_config["BASEDN_LDAP"];

        /* Try to distinguish duplicated users from existing LDAP users */
        //if ($ldap->dnExists($dn)) {
        if (LDAPAuthenticator::authenticateUser($userAttributes['cn'],
                  $userAttributes['userPassword'])) {
            /* Check user's credentials */
            $chkCredentials = LDAPAuthenticator::authenticateUser(
                $userAttributes['cn'], $userAttributes['userPassword']);
           
            if(!$chkCredentials){ /* invalid credentials */
                throw new Exception('CN=' . $userAttributes['cn'] .
                ' already exists.', 502);
            }else{
                throw new Exception('CN=' . $userAttributes['cn'] .
                ' already exists.', 500);
            }
            
        } elseif($userDomain == 'bireme.org') {
            throw new Exception('CN=' . $userAttributes['cn'] .
                ' invalid domain.', 503);
        }

        $attributes = array(
            // atributos variaveis
            'givenName'      => $userAttributes['givenName'],
            'cn'             => $userAttributes['cn'],
            'mail'           => $userAttributes['mail'],
            //'sAMAccountName' => $userAttributes['cn'],

            //atributos fixos
            'objectClass'       => $server_config['OBJECT_CLASS'],
            'objectCategory'    => $server_config['OBJECT_CATEGORY']
           
        );

        $entry = Net_LDAP2_Entry::createFresh($dn, $attributes);

        /* Add the entry to the directory */
        $ldap->add($entry);

        if (PEAR::isError($ldap)) {            
            throw new Exception($ldap->getMessage(), 501);
        }

        /* Step 2, setting user's password */
        $newPassword = '"' . $userAttributes['userPassword'] . '"';
        $len = strlen($newPassword);

        for ($i = 0; $i < $len; $i++){
            $newPassw .= "{$newPassword{$i}}\000";
        }

        $newPassword = $newPassw;

        $attributes2 = array('unicodePwd' => $newPassword,
            'userAccountControl' => '512');

        $entry->replace($attributes2,true);
        $entry->update($ldap);

        if (PEAR::isError($entry)) {
            throw new Exception($entry->getMessage(), 501);
        }
        return true;
    }

    /**
     * Update attributes from existing entries
     *
     * Mandatory element $userAttributes['cn']
     *
     * @param string $server_config String array with LDAP server configuration
     * @param string $userAttributes String array containing user attributes
     * @return boolean
     */
    public static function update($server_config, $userAttributes){
        try{
            $ldap = self::connect($server_config);
        }catch (Exception $e){
            throw $e;
        }

        if(!$ldap){
            throw new Exception($ldap->getMessage(), 601);
        }

        $dn = 'CN=' . $userAttributes['cn'] . ',' .
            $server_config["BASEDN_LDAP"];

        if ($ldap->dnExists($dn)) {

            $attributes = array();
            $entry = $ldap->getEntry($dn);

            /* update password */
            if(isset($userAttributes['userPassword'])){

                $newPassword = '"' . $userAttributes['userPassword'] . '"';
                $len = strlen($newPassword);

                for ($i = 0; $i < $len; $i++){
                    $newPassw .= "{$newPassword{$i}}\000";
                }

                $attributes['unicodePwd'] = $newPassw;

                /* need to check if it is necessary */
                if(isset($attributes['unicodePwd'])){
                    $entry->delete('unicodePwd');
                    $entry->update($ldap);
                }
            }

            /* update given name */
            if(isset($userAttributes['givenName'])){
                $attributes['givenName'] = $userAttributes['givenName'];
            }

            /* update mail */
            if(isset($userAttributes['mail'])){
                $attributes['mail'] = $userAttributes['mail'];
            }

            $attributes['userAccountControl'] = 
                isset($userAttributes['userAccountControl'])?
                $userAttributes['userAccountControl']:'512';

            $entry->replace($attributes,true);
            $entry->update($ldap);

            if (PEAR::isError($entry)) {
                throw new Exception($entry->getMessage(), 501);
            }
            return true;
        }
    }

    public static function resetPassword($userID, $newPass){
    $retValue = false;

        //validar dominio

        $server_config = ToolsAuthentication::configLDAPConnection($userID);

        try{
            $ldap = self::connect($server_config);
        }catch (Exception $e){
            throw $e;
        }

        if(!$ldap){
            throw new Exception($ldap->getMessage(), 601);
        }

        $dn = 'CN=' . $userID . ',' .
            $server_config["BASEDN_LDAP"];

        if ($ldap->dnExists($dn)) {

            $attributes = array();
            $entry = $ldap->getEntry($dn);

            /* update password */
            if(isset($newPass)){

                $newPassword = '"' . $newPass . '"';
                $len = strlen($newPassword);

                for ($i = 0; $i < $len; $i++){
                    $newPassw .= "{$newPassword{$i}}\000";
                }

                $attributes['unicodePwd'] = $newPassw;

                /* need to check if it is necessary */
                if(isset($attributes['unicodePwd'])){
                    $entry->delete('unicodePwd');
                    $entry->update($ldap);
                }

                $entry->replace($attributes,true);
                $entry->update($ldap);

                if (PEAR::isError($entry)) {
                    throw new Exception($entry->getMessage(), 501);
                }

                $retValue = true;
            }
            return $retValue;
        }
    }
    
    public static function changePassword($userID, $oldPass, $newPass){
        $retValue = false;

        //validar dominio

        $server_config = ToolsAuthentication::configLDAPConnection($userID);

        try{
            $ldap = self::connect($server_config, $userID, $oldPass);
        }catch (Exception $e){
            throw $e;
        }

        if(!$ldap){
            throw new Exception($ldap->getMessage(), 601);
        }

        $dn = 'CN=' . $userID . ',' .
            $server_config["BASEDN_LDAP"];

        if ($ldap->dnExists($dn)) {

            $attributes = array();
            $entry = $ldap->getEntry($dn);

            /* update password */
            if(isset($newPass)){

                $newPassword = '"' . $newPass . '"';
                $len = strlen($newPassword);

                for ($i = 0; $i < $len; $i++){
                    $newPassw .= "{$newPassword{$i}}\000";
                }

                $attributes['unicodePwd'] = $newPassw;

                /* need to check if it is necessary */
                if(isset($attributes['unicodePwd'])){
                    $entry->delete('unicodePwd');
                    $entry->update($ldap);
                }

                $entry->replace($attributes,true);
                $entry->update($ldap);

                if (PEAR::isError($entry)) {
                    throw new Exception($entry->getMessage(), 501);
                }

                $retValue = true;
            }
            return $retValue;
        }
    }

    public static function isUser($userID){
        $retValue = false;
        $server_config = ToolsAuthentication::configLDAPConnection($userID);

        try{
            $ldap = self::connect($server_config);
        }catch (Exception $e){
            throw $e;
        }

        if(!$ldap){
            throw new Exception($ldap->getMessage(), 601);
        }

        $cUserID = substr($userID,0,stripos($userID,'@'));

        /* Get the custom LDAP data, based on user's mail domain */
        $userDomain = substr(stristr($userID,'@'),1);

        /*
         * Review LDAP configuration
         */
        if( ($userDomain == 'bireme.org') || ($userDomain == 'scielo.org') ){
            $dn = $cUserID . '@bvs.bireme.local';
        }else{
            $dn = 'CN=' . $userID . ',' . $server_config["BASEDN_LDAP"];
        }

        if ($ldap->dnExists($dn)) {
            $retValue = true;
        }

        return $retValue;
    }

    public static function validateExternalUser($userID, $userPassword){
        $retValue = false;

        /* Get the custom LDAP data, based on user's mail domain */
        $userDomain = substr(stristr($userID,'@'),1);

        if( ($userDomain != 'bireme.org') && ($userDomain != 'scielo.org') ){

            $server_config = ToolsAuthentication::configLDAPConnection($userID);

            try{
                $ldap = self::connect($server_config);
            }catch (Exception $e){
                throw $e;
            }

            if (PEAR::isError($ldap)) {
                throw new Exception($ldap->getMessage(), 601);
            }
                 
            $dn = 'CN=' . $userID . ',' . $server_config["BASEDN_LDAP"];

            if ($ldap->dnExists($dn)) {
                $entry = $ldap->getEntry($dn);

                $sAMAccountName = $entry->getValue('sAMAccountName', 'single');

                if (PEAR::isError($sAMAccountName)) {
                    throw new Exception($sAMAccountName->getMessage(), 501);
                }

                try{
                    $usrConnection = self::connect($server_config, $sAMAccountName, $userPassword);
                }catch (Exception $e){
                    throw $e;
                }

                if(!$usrConnection){
                    throw new Exception($usrConnection->getMessage(), 601);
                }

                $retValue = true;
            }

        }

        return $retValue;        
    }

}
?>
