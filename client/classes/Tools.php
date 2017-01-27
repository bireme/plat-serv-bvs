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

    /**
     * show the paginator
     */
    function render($next, $previous){
        $cleanURL = preg_replace('/\/page.*$/', '',
            'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        $page = $this->currentPage;

        $strPaginator = '<div class="row">';
        $strPaginator .= '<div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">';
        $strPaginator .= '<ul class="pagination" style="margin: 0;">';

        $disabled = ( $page == 0 ) ? 'disabled' : '';
        $previousPage = ( empty($disabled) ) ? $cleanURL . '/page/' . $page : 'javascript:;';
        $strPaginator .= '<li class="paginate_button previous ' . $disabled . '" id="datatable_previous"><a href="' . $previousPage . '" aria-controls="datatable" tabindex="0">' . $previous . '</a></li>';

        for($i = 1; $i <= $this->totalPages; $i++){
            if($page == ($i - 1)){
                $strPaginator .= '<li class="paginate_button active">';
                $url = 'javascript:;';
            }else{
                $strPaginator .= '<li class="paginate_button">';
                $url = $cleanURL . '/page/' . $i;
            }
            $strPaginator .= '<a href="' . $url . '" aria-controls="datatable" tabindex="0">' . $i . '</a>';
            $strPaginator .= '</li>';
        }
        
        $disabled = ( $page + 1 == $this->totalPages ) ? 'disabled' : '';
        $nextPage = ( empty($disabled) ) ? $cleanURL . '/page/' . ($page + 2) : 'javascript:;';
        $strPaginator .= '<li class="paginate_button next ' . $disabled . '" id="datatable_next"><a href="' . $nextPage . '" aria-controls="datatable" tabindex="0">' . $next . '</a></li>';

        $strPaginator .= '</ul>';
        $strPaginator .= '</div>';
        $strPaginator .= '</div>';

        return $strPaginator;
    }

}

/**
 * manage user token
 */
class Token {

    public static function makeUserTK($userID,$userPass,$socialMedia){
        if ( $socialMedia )
            return Crypt::encrypt($userID.'%+%'.$userPass.'%+%'.$socialMedia, CRYPT_PUBKEY);
        else
            return Crypt::encrypt($userID.'%+%'.$userPass, CRYPT_PUBKEY);
    }

    public static function unmakeUserTK($userTK, $force=null){
        $retValue = false;

        $tmp1 = explode('%+%',Crypt::decrypt($userTK, CRYPT_PUBKEY));

        if($force === true || preg_match(REGEXP_EMAIL,$tmp1[0])){
            $tmp2['userID'] = $tmp1[0];
            $tmp2['userPass'] = $tmp1[1];
            $retValue = $tmp2;
        }elseif($tmp1[2] && in_array($tmp1[2], array('facebook', 'google'))){
            $tmp2['userID'] = $tmp1[0];
            $tmp2['userPass'] = $tmp1[1];
            $tmp2['socialMedia'] = $tmp1[2];
            $retValue = $tmp2;
        }

        return $retValue;
    }

}
?>
