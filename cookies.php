<?php
/*
    define('CRYPT_PUBKEY','biremepublicckey');
    define('CRYPT_SEPARATOR','');

    if( isset( $_REQUEST["userData"] ) && !empty( $_REQUEST["userData"] ) ) {
        $userData = json_decode(base64_decode($_REQUEST['userData']), true);

        if ( isset($userData['userTK']) && !empty($userData['userTK']) ) {
            if ( 'bireme_accounts' == $userData['source'] )
                $token = unmakeUserTK($userData['userTK'], true);
            else
                $token = unmakeUserTK($userData['userTK']);

            if ( $token )
                setcookie("userData", $_REQUEST["userData"], 0, '/', '.bvs.br');
        }
    }
    else {
        setcookie("userData", "", time() -3600, '/', '.bvs.br');
    }

    function decrypt($text, $cKey=CRYPT_PUBKEY){
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,
                $cKey, base64_decode($text), MCRYPT_MODE_ECB,
                mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256,
                        MCRYPT_MODE_ECB), MCRYPT_RAND)));
    }

    function unmakeUserTK($userTK, $force=null){
        $retValue = false;
        $tmp1 = explode(CRYPT_SEPARATOR, decrypt($userTK, CRYPT_PUBKEY));
        $valid_email = filter_var($tmp1[0], FILTER_VALIDATE_EMAIL);

        if($force === true){
            $tmp2['userID'] = $tmp1[0];
            $tmp2['userPass'] = $tmp1[1];
            $tmp2['userSource'] = $tmp1[2];
            $retValue = $tmp2;
        }elseif($valid_email){
            $tmp2['userID'] = $tmp1[0];
            $tmp2['userPass'] = $tmp1[1];
            $tmp2['userSource'] = $tmp1[2];
            $retValue = $tmp2;
        }

        return $retValue;
    }
*/
?>
