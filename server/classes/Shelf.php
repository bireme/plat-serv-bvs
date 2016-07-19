<?php
/**
 * User Shelf Class
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
class Shelf {

    /**
     * Set shelf id
     *
     * @param int $shelfID
     */
    function setShelfID($shelfID){
        $this->_data['shelf_id'] = $shelfID;
    }

    /**
     * Get shelf id
     *
     * @return int
     */
    function getShelfID(){
        return $this->_data['shelfID'];
    }

    /**
     * Set directory
     *
     * @param object $data UserDirectory object
     */
    function setDir($data){
        $this->_data['directory'] = $data;
    }

    /**
     * Get directory
     *
     * @return object UserDirectory object
     */
    function getDir(){
        return $this->_data['directory'];
    }

    /**
     * Set document
     *
     * @param object $document Document object
     */
    function setDocument($document){
        $this->_data['document'] = $document;
    }

    /**
     * Get document
     *
     * @return object Document object
     */
    function getDocument(){
        return $this->_data['document'];
    }

    /**
     * Set user ID
     *
     * @param string $value User ID
     */
    function setUserID($value){
        $this->_data['userID'] = $value;
    }

    /**
     * Get user ID
     *
     * @return string
     */
    function getUserID(){
        return $this->_data['userID'];
    }

    /**
     * Set shelf's document rate
     *
     * @param int $rate
     */
    function setRate($rate){
        $this->_data['rate'] = $rate;
    }

    /**
     * Get shelf's document rate
     *
     * @return int
     */
    function getRate(){
        return $this->_data['rate'];
    }

    /**
     * Set cited stat
     *
     * @param int $value 0|1
     */
    function setCitedStat($value){
        $this->_data['cited_stat'] = $value;
    }

    /**
     * Get cited stat
     *
     * @return int $value 0|1
     */
    function getCitedStat(){
        return $this->_data['cited_stat'];
    }

    /**
     * Set access stat
     *
     * @param int $value 0|1
     */
    function setAccessStat($value){
        $this->_data['access_stat'] = $value;
    }

    /**
     * Get access stat
     *
     * @return int $value 0|1
     */
    function getAccessStat(){
        return $this->_data['access_stat'];
    }

    /**
     * Set visibility status
     *
     * @param int $value 0|1
     */
    function setVisible($value){
        $this->_data['visible'] = $value;
    }

    /**
     * Get visibility status
     *
     * @param int $value 0|1
     */
    function getVisible(){
        return $this->_data['visible'];
    }
}
?>