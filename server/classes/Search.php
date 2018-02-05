<?php
/**
 * User SearchDAO Class
 *
 * Handle users search results
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Wilson da Silva Moura (mourawil@paho.org)
 * @copyright   BIREME/OPAS/OMS
 *
 */

/*
 * Edit this file in UTF-8 - Test String "áéíóú"
 */

class Search {

     function  __construct(){}

    /*
     * set user id
     *
     * @param string $userID
     * @return void
     */
	 function setUID($userID){
		$this->_uid = $userID;
	}
    
    /*
     * get user id
     *
     * @return string
     */
     function getUID(){
		return ($this->_uid);
	}

    /*
     * set RSS id
     *
     * @param integer $searchID
     * @return void
     */
	 function setSID($searchID){
		$this->_sid = $searchID;
	}

    /*
     * get RSS id
     *
     * @return integer
     */
     function getSID(){
		return ($this->_sid);
	}

    /*
     * set RSS link
     *
     * @param string $url
     * @return void
     */
	 function setURL($url){
		$this->_url = $url;
	}

    /*
     * get RSS link
     *
     * @return string
     */
     function getURL(){
		return ($this->_url);
	}

    /*
     * set RSS name
     *
     * @param string $name
     * @return void
     */
	 function setName($name){
		$this->_name = $name;
	}

    /*
     * get RSS name
     *
     * @return string
     */
     function getName(){
		return ($this->_name);
	}

    /*
     * set creation date
     *
     * @param string $date
     * @return void
     */
     function setCreationDate($date){
        $this->_creation_date = $date;
    }

    /*
     * get creation date generated automaticaly when the RSS is added
     *
     * @return string
     */
     function getCreationDate(){
		return ($this->_creation_date);
	}
}
?>