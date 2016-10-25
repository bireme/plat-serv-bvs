<?php
/**
 * Common Tools
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
require_once(dirname(__FILE__)."/../config.php");
require_once(dirname(__FILE__)."/../lib/phpMailer/class.phpmailer.php");
require_once(dirname(__FILE__)."/../lib/libLog/Log.php");

/**
 * Implements the MCRYPT module functions
 */
class Crypt {

    /**
     * Encrypt a given string
     *
     * @param string $text
     * @param string $cKey Encryption salt
     * @return string
     */
    public static function encrypt($text,$cKey=CRYPT_KEY){
        return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,
                    $cKey, $text, MCRYPT_MODE_ECB,
                    mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, 
                            MCRYPT_MODE_ECB), MCRYPT_RAND))));    
    }

    /**
     * Decrypt a given string
     *
     * @param string $text
     * @param string $cKey Encryption salt
     * @return string
     */
    public static function decrypt($text,$cKey=CRYPT_KEY){
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, 
                $cKey, base64_decode($text), MCRYPT_MODE_ECB,
                mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, 
                        MCRYPT_MODE_ECB), MCRYPT_RAND)));
    }
}

/**
 * Send Mail Class
 */
class Mailer {
    /**
     * Send Mail
     *
     * @param string $body email body
     * @param string $subject  email subject
     * @param string $to emails array
     */
    public static function sendMail($body,$subject,$to,$fromMail=EMAIL_FROM,
        $fromName=EMAIL_FROMNAME){
        // send an email to $userID
        
        $objMailer = new PHPMailer();
        $objMailer->Host = EMAIL_HOST;
        $objMailer->From = $fromMail;
        $objMailer->FromName = $fromName;
        $objMailer->Username = EMAIL_USERNAME;
        $objMailer->Password = EMAIL_PASSWORD;
        $objMailer->IsSMTP();
        $objMailer->SMTPAuth = true;

        $objMailer->IsHTML(false);
        $objMailer->ClearAddresses();
        foreach ($to as $user){
            $objMailer->AddAddress($user);
        }
        $objMailer->Subject = $subject;
        $objMailer->Body = $body;

        if(!$objMailer->Send()){
            $retValue = array('mail' => false);

            $logger = &Log::singleton('file', LOG_FILE_MAIL,
                __CLASS__, $_conf);
            $logger->log('Mail send error :' .
                $objMailer->ErrorInfo,PEAR_LOG_INFO);
        }else{
            $retValue = array('mail' => true);

            $logger = &Log::singleton('file', LOG_FILE_MAIL,
                __CLASS__, $_conf);
            $logger->log('Mail send success',PEAR_LOG_INFO);
        }

        unset($objMailer);
        $retValue = array('status' => true);

        return $retValue;
    }

}

/**
 * manage user token
 */
class Token {

    /**
     * Generate a user token
     *
     * @param string $userID User ID
     * @param string $userPass User password
     * @return string
     */
    public static function makeUserTK($userID,$userPass,$socialMedia){
        if ( $socialMedia )
            return Crypt::encrypt($userID.'%+%'.$userPass.'%+%'.$socialMedia, CRYPT_PUBKEY);
        else
            return Crypt::encrypt($userID.'%+%'.$userPass, CRYPT_PUBKEY);
    }

    /**
     * Get username and password from a given user token
     *
     * @param string $userTK
     * @return array Containing userID and userPass
     */
    public static function unmakeUserTK($userTK, $force=null){
        $retValue = false;

        $tmp1 = explode('%+%',Crypt::decrypt($userTK, CRYPT_PUBKEY));

        if($force === true || preg_match(REGEXP_EMAIL,$tmp1[0])){
            $tmp2['userID'] = $tmp1[0];
            $tmp2['userPass'] = $tmp1[1];
            $retValue = $tmp2;
        }elseif($tmp1[2]){
            $tmp2['userID'] = $tmp1[0];
            $tmp2['userPass'] = $tmp1[1];
            $tmp2['socialMedia'] = $tmp1[2];
            $retValue = $tmp2;
        }

        return $retValue;
    }
}

/**
 * charset convertion utilities
 */
class CharTools {

    /**
     * Equalize the input string charset
     *
     * @param string $string
     * @return string
     */
    public static function eqStrCharset($string){
        /* if the string charset is different from the sys charset */
        if(!mb_check_encoding($string,SYS_CHARSET)){
            /* convert to the defined sys internal charset */
            return mb_convert_encoding($string,SYS_CHARSET,mb_detect_encoding($string,ACCEPTED_CHARSETS));
        }else{
            return $string;
        }
    }

    /**
     * Equalize the input string array charset
     *
     * @param string $arrString String array
     * @return string String array
     */
    public static function eqStrCharsetFromArray($arrString){
        $retValue = false;
        if(is_array($arrString)){
            $retValue = array();
            foreach($arrString as $key => $value){
                $retValue[$key] = self::eqStrCharset($value);
            }
        }
        return $retValue;
    }

    /**
     * Escaping MySQL strings without connection 
     *
     * @param string $unescaped Query unescaped
     * @return string
     */
    public static function mysql_escape_mimic($unescaped) {
        $replacements = array(
            "\x00" => '\x00',
            "\n"   => '\n',
            "\r"   => '\r',
            "\\"   => '\\\\',
            "'"    => "\'",
            '"'    => '\"',
            "\x1a" => '\x1a'
        );
        return strtr($unescaped,$replacements);
    }
}

/**
 * manage social network data
 */
class SocialNetwork {

    /**
     * Validate social network user
     *
     * @param array $userObject
     * @return boolean
     */
    public static function validateObjUser($userObject) {
        if ( !isset($userObject) )
            return false;
        elseif ( empty($userObject) )
            return false;
        elseif ( !is_array($userObject) )
            return false;
        elseif ( !array_key_exists( "social_media", $userObject ) )
            return false;
        elseif ( !in_array( $userObject['social_media'], array( 'facebook', 'google' ) ) )
            return false;
        
        return true;
    }
}
?>