<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once(dirname(__FILE__)."/../config.php");

/*
 * Implements the MCRYPT module functions
 */
class Crypt {

    public static function encrypt($text,$cKey=CRYPT_PUBKEY){
        return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,
                    $cKey, $text, MCRYPT_MODE_ECB,
                    mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256,
                            MCRYPT_MODE_ECB), MCRYPT_RAND))));
    }

    public static function decrypt($text,$cKey=CRYPT_PUBKEY){
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,
                $cKey, base64_decode($text), MCRYPT_MODE_ECB,
                mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256,
                        MCRYPT_MODE_ECB), MCRYPT_RAND)));
    }
}

class Paginator {
        
    function  __construct($totalPages, $currentPage) {
        $this->totalPages = $totalPages;
        //$this->currentPage = ($currentPage - 1);
        $this->currentPage = is_numeric($currentPage) &&
            $currentPage <= $this->totalPages ? ($currentPage - 1) : 0;
    }

    function getCurrentPage(){
        return $this->currentPage;
    }

    /**
     * render the paginator
     */
    function show($label){
        $cleanURL = preg_replace('/\/page.*$/', '',
            'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        $page = $this->currentPage;

        $strPaginator = '<div id="paginator">';
        $strPaginator .= '<span>'. $label .'</span>';

        for($i = 1; $i <= $this->totalPages; $i++){
            if($page == ($i - 1)){
                $strPaginator .= '<span class="paginatorSelected">';
            }else{
                $strPaginator .= '<span class="paginator">';
            }
            $strPaginator .= '<a href="' . $cleanURL .
                '/page/' . $i . '">' . $i . '</a>';
            $strPaginator .= '</span>';
        }
        
        $strPaginator .= '</div>';

        return $strPaginator;
    }


}
?>
