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
     * show the paginator
     */
    function show($label){
        $cleanURL = preg_replace('/\/page.*$/', '',
            'http://' . $_SERVER['HTTP_HOST'] . rtrim($_SERVER['PHP_SELF'], '/'));
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
     * render the paginator
     */
    function render($next, $previous){
        $cleanURL = preg_replace('/\/page.*$/', '',
            'http://' . $_SERVER['HTTP_HOST'] . rtrim($_SERVER['PHP_SELF'], '/'));
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

    /**
     * build the paginator
     */
    function build(){
        $cleanURL = preg_replace('/\/page.*$/', '',
            'http://' . $_SERVER['HTTP_HOST'] . rtrim($_SERVER['PHP_SELF'], '/'));
        $page = $this->currentPage;

        $strPaginator = '<div class="center-align">';
        $strPaginator .= '<ul class="pagination">';

        $disabled = ( $page == 0 ) ? 'disabled' : 'waves-effect';
        $previousPage = ( 'disabled' == $disabled ) ? 'javascript:;' : $cleanURL . '/page/' . $page;
        $strPaginator .= '<li class="' . $disabled . '"><a href="' . $previousPage . '"><i class="material-icons">chevron_left</i></a></li>';

        for($i = 1; $i <= $this->totalPages; $i++){
            if($page == ($i - 1)){
                $strPaginator .= '<li class="active green">';
                $url = 'javascript:;';
            }else{
                $strPaginator .= '<li class="waves-effect">';
                $url = $cleanURL . '/page/' . $i;
            }
            $strPaginator .= '<a href="' . $url . '">' . $i . '</a>';
            $strPaginator .= '</li>';
        }
        
        $disabled = ( $page + 1 == $this->totalPages ) ? 'disabled' : 'waves-effect';
        $nextPage = ( 'disabled' == $disabled ) ? 'javascript:;' : $cleanURL . '/page/' . ($page + 2);
        $strPaginator .= '<li class="' . $disabled . '"><a href="' . $nextPage . '"><i class="material-icons">chevron_right</i></a></li>';

        $strPaginator .= '</ul>';
        $strPaginator .= '</div>';

        return $strPaginator;
    }

}

/**
 * manage user token
 */
class Token {

    public static function makeUserTK($userID,$userPass,$userSource){
        return Crypt::encrypt($userID.CRYPT_SEPARATOR.$userPass.CRYPT_SEPARATOR.$userSource, CRYPT_PUBKEY);
    }

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

}

class CharTools {

    /**
     * Equalize the input string charset
     *
     * @param string $string
     * @return string
     */
    public static function shortenedQueryString($query,$crop=true){
        $query = htmlspecialchars_decode($query);

        if ( strlen($query) > 100 ) {
            $start = substr($query, 0, 100);
            $end = substr($query, 100);

            if ($crop) {
                $query = $start . ' [...]';
            } else {
                return $start.'<span class="show-all"> [...]</span><span class="short-query">'.$end.'</span>';
            }
        }

        return $query;
    }

}

class UserData {

    public static function sendCookie($userTK,$return=false){
        $userData = '';

        if ( isset($userTK) && !empty($userTK) ) {
            $source = ( $_SESSION['source'] ) ? $_SESSION['source'] : '';

            if ( 'bireme_accounts' == $source )
                $data = Token::unmakeUserTK($userTK, true);
            else
                $data = Token::unmakeUserTK($userTK);

            if ( $data ) {
                unset($userData);
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

        $src = BVS_COOKIE_DOMAIN.'/cookies.php?userData='.$userData;

        ?>
        <script type="text/javascript">
            var element = document.createElement("img");
            element.setAttribute('src', "<?php echo $src; ?>");
        </script>
        <?php

        if ( $return ) return $userData;
    }

}

class Generic {

    public static function unique_list_docs($array, $key) {
        // walk input array
        $_data = array();

        foreach ($array as $v) {
            // found duplicate
            if (isset($_data[$v[$key]])) {
                // docURL
                $docURL = array();
                $site = end(explode('/', $v['srcID']));
                $_site = end(explode('/', $_data[$v[$key]]['srcID']));

                if ( is_array($_data[$v[$key]]['docURL']) ) {
                    $docURL = $_data[$v[$key]]['docURL'];
                    $docURL[$site] = $v['docURL'];
                } else {
                    $docURL[$site] = $v['docURL'];
                    $docURL[$_site] = $_data[$v[$key]]['docURL'];
                }

                // update doc with the latest data
                if ( $_data[$v[$key]]['process_date'] < $v['process_date'] ) {
                    $_data[$v[$key]] = $v;
                }

                $_data[$v[$key]]['docURL'] = $docURL;

                continue;
            }

            // remember unique item
            $_data[$v[$key]] = $v;
        }

        // if you need a zero-based array, otheriwse work with $_data
        $data = array_values($_data);

        return $data;
    }

    public static function month_name($month_number=13, $short=FALSE, $lang) {
        $month_name = '';
        $lang = ( $lang ) ? $lang : $_SESSION['lang'];

        $full_names = array();
        $full_names['pt'] = array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
        $full_names['en'] = array("January","February","March","April","May","June","July","August","Septeber","October","November","Dezember");
        $full_names['es'] = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

        $short_names = array();
        $short_names['pt'] = array("Jan","Fev","Mar","Abr","Maio","Jun","Jul","Ago","Set","Out","Nov","Dez");
        $short_names['en'] = array("Jan","Feb","Mar","Apr","May","June","July","Aug","Sept","Oct","Nov","Dez");
        $short_names['es'] = array("Ene","Feb","Mar","Abr","Mayo","Jun","Jul","Ago","Sep","Oct","Nov","Dic");

        if ( $short ) {
            $month_name = $short_names[$lang][$month_number-1];
        } else {
            $month_name = $full_names[$lang][$month_number-1];
        }

        return $month_name;
    }

}

class Events {

    public static function get_events($query, $count, $lang, $assoc=FALSE) {
        $lang       = ( $lang ) ? $lang : $_SESSION['lang'];
        $count      = ( $count ) ? $count : WIDGETS_ITEMS_LIMIT;
        $start_date = 'start_date:[NOW TO *]';
        $query      = ( $query ) ? $query . ' ' . $start_date : $start_date;
        $request    = FI_ADMIN_EVENTS . '&q=' . urlencode($query) . '&count=' . $count . '&lang=' . $lang . '&sort=start_date%20asc';
        $response   = json_decode(file_get_contents($request), $assoc);
        $json       = $response->diaServerResponse[0]->response->docs;

        return $json;
    }

}

class Slider {

    public static function get_highlights() {
        $highlights = array();
        $dir    = dirname(__FILE__, 2) . '/images/' . $_SESSION["skin"] . '/highlights';
        $slides = glob($dir . "/*.jpg");
        $links = file($dir.'/links.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($slides as $key => $value) {
            $src = str_replace($_SERVER['DOCUMENT_ROOT'], '', $value);
            $highlights[$key]['image'] = $src;
            $highlights[$key]['link'] = $links[$key];
        }

        return $highlights;
    }
}

?>
