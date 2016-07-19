<?php
/**
 * User News Class
 *
 * object users news
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

/**
 * News Class
 *
 * This class is the representation of the news object that will be used to
 * handle the user RSS's in user news service.
 */
class News {


    function News(){
    }

    /**
     * Get news ID
     *
     * @return int
     */
    function getID(){
        return $this->_newsID;
    }

    /**
     * Get news URL
     *
     * @return string
     */
    function getUrl(){
        return $this->_url;
    }

    /**
     * Get in home flag
     *
     * @return boolean
     */
    function getInHome(){
        return $this->_inHome;
    }

    /**
     * Get user ID
     *
     * @return string
     */
    function getUserID(){
        return $this->_userID;
    }

    /**
     * Get news name
     *
     * @return string
     */
    function getName(){
        return $this->_name;
    }

    /**
     * Get news description
     *
     * @return string
     */
    function getDescription(){
        return $this->_description;
    }

    /**
     * Get news rate
     *
     * @return int
     */
    function getRate(){
        return $this->_rate;
    }

    /**
     *  Set news ID
     *
     * @param int $value
     */
    function setID($value){
        $this->_newsID = $value;
    }

    /**
     * Set news URL
     *
     * @param string $value
     */
    function setUrl($value){

        if(!preg_match(REGEXP_HTTP, $value)){
            $value = 'http://' . $value;
        }

        $this->_url = $value;
    }

    /**
     * Set in home
     *
     * @param <type> $value
     */
    function setInHome($value){
        $this->_inHome = $value;
    }

    /**
     * Set user ID
     *
     * @param string $value
     */
    function setUserID($value){
        $this->_userID = $value;
    }

    /**
     * Set news name
     *
     * @param string $value
     */
    function setName($value){
        $this->_name = $value;
    }

    /**
     * Set news description
     *
     * @param string $value
     */
    function setDescription($value){
        $this->_description = $value;
    }

    /**
     * Set news rate
     * 
     * @param string $value
     */
    function setRate($value){
        $this->_rate = $value;
    }
}
?>
