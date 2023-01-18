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

    /**
    * Method to create hash_pbkdf2 (for php v<5.5)
    * @param null
    * @access public
    * @return null
    */

    public static function hash_pbkdf2($algo, $password, $salt, $count, $length = 0, $raw_output = false){
        if (!in_array(strtolower($algo), hash_algos())) trigger_error(__FUNCTION__ . '(): Unknown hashing algorithm: ' . $algo, E_USER_WARNING);
        if (!is_numeric($count)) trigger_error(__FUNCTION__ . '(): expects parameter 4 to be long, ' . gettype($count) . ' given', E_USER_WARNING);
        if (!is_numeric($length)) trigger_error(__FUNCTION__ . '(): expects parameter 5 to be long, ' . gettype($length) . ' given', E_USER_WARNING);
        if ($count <= 0) trigger_error(__FUNCTION__ . '(): Iterations must be a positive integer: ' . $count, E_USER_WARNING);
        if ($length < 0) trigger_error(__FUNCTION__ . '(): Length must be greater than or equal to 0: ' . $length, E_USER_WARNING);

        $output = '';
        $block_count = $length ? ceil($length / strlen(hash($algo, '', $raw_output))) : 1;
        for ($i = 1; $i <= $block_count; $i++)
        {
            $last = $xorsum = hash_hmac($algo, $salt . pack('N', $i), $password, true);
            for ($j = 1; $j < $count; $j++)
            {
                $xorsum ^= ($last = hash_hmac($algo, $last, $password, true));
            }
            $output .= $xorsum;
        }

        if (!$raw_output) $output = bin2hex($output);
        return $length ? substr($output, 0, $length) : $output;
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
     * @param string $subject email subject
     * @param string $to emails array
     */
    public static function sendMail($body,$altbody,$subject,$to,$fromMail=EMAIL_FROM,
        $fromName=EMAIL_FROMNAME){
        global $_conf;

        $objMailer = new PHPMailer();
        $objMailer->CharSet = CHARSET;
        $objMailer->Host = EMAIL_HOST;
        $objMailer->From = $fromMail;
        $objMailer->FromName = $fromName;
        $objMailer->Username = EMAIL_USERNAME;
        $objMailer->Password = EMAIL_PASSWORD;
        $objMailer->IsSMTP();
        $objMailer->SMTPAuth = true;
        if ( EMAIL_PORT ) {
            $objMailer->Port = EMAIL_PORT;
        }
        if ( EMAIL_SECURE && in_array(EMAIL_SECURE, array('ssl', 'tls')) ) {
            $objMailer->SMTPSecure = EMAIL_SECURE;
        }
        $objMailer->IsHTML(true);
        $objMailer->ClearAddresses();
        foreach ($to as $user){
            $objMailer->AddAddress($user);
        }
        $objMailer->Subject = mb_encode_mimeheader($subject, CHARSET);
        $objMailer->Body = $body;
        $objMailer->AltBody = $altbody;

        if(!$objMailer->Send()){
            $retValue = false;

            $logger = &Log::singleton('file', LOG_FILE_MAIL,
                __CLASS__, $_conf);
            $logger->log('Mail send error :' .
                $objMailer->ErrorInfo,PEAR_LOG_INFO);
        }else{
            $retValue = true;

            $logger = &Log::singleton('file', LOG_FILE_MAIL,
                __CLASS__, $_conf);
            $logger->log('Mail send success',PEAR_LOG_INFO);
        }

        unset($objMailer);

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
     * @param string $userSource User source
     * @return string
     */
    public static function makeUserTK($userID,$userPass,$userSource){
        return Crypt::encrypt($userID.CRYPT_SEPARATOR.$userPass.CRYPT_SEPARATOR.$userSource, CRYPT_PUBKEY);
    }

    /**
     * Get username and password from a given user token
     *
     * @param string $userTK
     * @return array Containing userID and userPass
     */
    public static function unmakeUserTK($userTK, $force=null){
        $retValue = false;
        $tmp1 = explode(CRYPT_SEPARATOR,Crypt::decrypt($userTK, CRYPT_PUBKEY));
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

    public static function recaptcha_validator($g_recaptcha_response){
        $api_key = "&secret=" . RECAPTCHA_SECRET_KEY;
        $api_response = "&response=" . $g_recaptcha_response;
        $url = RECAPTCHA_API_URL . $api_key . $api_response;
        $response = json_decode(file_get_contents($url), true);

        return $response['success'];
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

class UserData {

    public static function getData($userTK=null){
        $userData = false;

        if ( isset($userTK) && !empty($userTK) ) {
            $source = ( $_SESSION['source'] ) ? $_SESSION['source'] : '';

            if ( 'bireme_accounts' == $source )
                $data = Token::unmakeUserTK($userTK, true);
            else
                $data = Token::unmakeUserTK($userTK);

            if ( $data ) {
                $userData = array();
                $userData['userTK'] = $userTK;
                $userData['firstName'] = $_SESSION["userFirstName"];
                $userData['lastName'] = $_SESSION["userLastName"];
                $userData['email'] = $_SESSION["userMail"];
                $userData['source'] = $_SESSION["source"];

                // Facebook data
                if ( isset($_SESSION["fb_data"]) && !empty($_SESSION["fb_data"]) )
                    $userData['fb_data'] = $_SESSION["fb_data"];

                // Google data
                if ( isset($_SESSION["google_data"]) && !empty($_SESSION["google_data"]) )
                    $userData['google_data'] = $_SESSION["google_data"];

                $userData = base64_encode(json_encode($userData));
            }
        }

        return $userData;
    }

    /**
     * Resize image - preserve ratio of width and height.
     * @param string $sourceImage path to source JPEG image
     * @param string $targetImage path to final JPEG image file
     * @param int $maxWidth maximum width of final image (value 0 - width is optional)
     * @param int $maxHeight maximum height of final image (value 0 - height is optional)
     * @param int $quality quality of final image (0-100)
     * @return bool
     */
    public static function resizeImage($sourceImage, $targetImage, $maxWidth, $maxHeight, $quality=100) {
        $image = false;
        $imageData = getimagesize($sourceImage);

        // Create image from file
        switch(strtolower($imageData['mime']))
        {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($sourceImage);
                break;
            case 'image/png':
                $image = imagecreatefrompng($sourceImage);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($sourceImage);
                break;
        }

        // Obtain image from given source file.
        if ( !$image ) {
            return false;
        }

        // Get dimensions and mime-type of source image.
        list($origWidth, $origHeight) = getimagesize($sourceImage);

        if ($maxWidth == 0) {
            $maxWidth  = $origWidth;
        }

        if ($maxHeight == 0) {
            $maxHeight = $origHeight;
        }

        // Calculate ratio of desired maximum sizes and original sizes.
        $widthRatio = $maxWidth / $origWidth;
        $heightRatio = $maxHeight / $origHeight;

        // Ratio used for calculating new image dimensions.
        $ratio = min($widthRatio, $heightRatio);

        // Calculate new image dimensions.
        $newWidth  = (int)$origWidth  * $ratio;
        $newHeight = (int)$origHeight * $ratio;

        // Create final image with new dimensions.
        $newImage = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
        imagejpeg($newImage, $targetImage, $quality);

        // Free up the memory.
        imagedestroy($image);
        imagedestroy($newImage);

        return true;
    }

    public static function avatar_upload($userID, $file){
        $hash = md5($userID);
        $filename = CharTools::mysql_escape_mimic($file['name']);
        $filename = $hash.'_'.$filename;
        $uploads_path = $_SERVER['DOCUMENT_ROOT'].RELATIVE_PATH.'/images/'.$_SESSION['skin'].'/uploads/';

        //path were our avatar image will be stored
        $avatar_path = $uploads_path.$filename;
/*
        // Check if file already exists
        if (file_exists($avatar_path)) {
            echo "Sorry, file already exists.";
            return false;
        }

        // Check file size
        if ($file["size"] > 500000) {
            echo "Sorry, your file is too large.";
            return false;
        }
*/
        //make sure the file type is image
        if (preg_match("!image!",$file['type']))
        {
            //copy image to uploads folder
            if (copy($file['tmp_name'], $avatar_path)) 
            {
                //self::resizeImage($avatar_path, $avatar_path, 100, 100);
                return $filename;
            }
        }

        return false;
    }

}

/** 
 * Logging class:
 * - contains lfile, lwrite and lclose public methods
 * - lfile sets path and name of log file
 * - lwrite writes message to the log file (and implicitly opens log file)
 * - lclose closes log file
 * - lrun runs log proccess
 * - first call of lwrite method will open log file implicitly
 * - message is written with the following format: [d/m/Y H:i:s] (script name) message
 */
class Logging {
    // declare log file and file pointer as private properties
    private $log_file, $fp;

    // set log file (path and name)
    public function lfile($path) {
        $this->log_file = $path;
    }

    // write message to the log file
    public function lwrite($message) {
        // if file pointer doesn't exist, then open log file
        if (!is_resource($this->fp)) {
            $this->lopen();
        }
        // define script name
        $script_name = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
        // define current time and suppress E_WARNING if using the system TZ settings
        // (don't forget to set the INI setting date.timezone)
        $time = @date('[d/m/Y H:i:s]');
        // write current time, script name and message to the log file
        fwrite($this->fp, "$time ($script_name) $message" . PHP_EOL);
    }

    // close log file (it's always a good idea to close a file when you're done with it)
    public function lclose() {
        fclose($this->fp);
    }

    // open log file (private method)
    private function lopen() {
        // in case of Windows set default log file
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $log_file_default = 'c:/php/logfile.txt';
        }
        // set default log file for Linux and other systems
        else {
            $log_file_default = '/tmp/logfile.txt';
        }
        // define log file from lfile method or use previously set default
        $lfile = $this->log_file ? $this->log_file : $log_file_default;
        // open log file for writing only and place file pointer at the end of the file
        // (if the file does not exist, try to create it)
        $this->fp = fopen($lfile, 'a') or exit("Can't open $lfile!");
    }

    public function lrun($userID, $file='', $method='') {
        $args = array();
        $args['method'] = $method;
        $args['userID'] = $userID;
        $args['message'] = 'SimilarDocs unavailable or under maintenance.';
        
        $msg = implode(' - ', array_filter($args));

        // set path and name of log file (optional)
        $this->lfile($file);
        // write message to the log file
        $this->lwrite($msg);
        // close log file
        $this->lclose();
    }
}
?>
