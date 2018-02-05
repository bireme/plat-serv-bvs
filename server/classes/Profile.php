<?php
/**
 * User LinksDAO Class
 *
 * Handle users links
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

class Profile{

     function  __construct(){}

    /*
     * set user id
     *
     * @param string $userID
     * @return void
     */
	 function setUserID($userID){
		$this->_user_id = $userID;
	}
    
    /*
     * get user id
     *
     * @return string
     */
     function getUserID(){
		return ($this->_user_id);
	}

    /*
     * set profile id
     *
     * @param integer $profileID
     * @return void
     */
	 function setProfileID($profileID){
		$this->_profile_id = $profileID;
	}

    /*
     * get profile id
     *
     * @return integer
     */
     function getProfileID(){
		return ($this->_profile_id);
	}

    /*
     * set profile text
     *
     * @param string $profileText
     * @return void
     */
	 function setProfileText($profileText){
		$this->_profile_text = $profileText;
	}

    /*
     * get profile text
     *
     * @return string
     */
     function getProfileText(){
		return ($this->_profile_text);
	}

    /*
     * set profile name
     *
     * @param string $profileName
     * @return void
     */
	 function setProfileName($profileName){
		$this->_profile_name = $profileName;
	}

    /*
     * get profile name
     *
     * @return string
     */
     function getProfileName(){
		return ($this->_profile_name);
	}

    /*
     * set profile status
     *
     * @param bit $profileStatus
     * @return void
     */
	 function setProfileStatus($profileStatus){
		$this->_profile_status = $profileStatus;
	}
    /*
     * get profile status
     *
     * @return bit
     */
     function getProfileStatus(){
		return $this->_profile_status;
	}

    /*
     * set creation date
     *
     * @param string $date
     * @return void
     */
     function setCreationDate($date){
        $this->_creationDate = $date;
    }

    /*
     * get creation date generated automaticaly when the profile is added
     *
     * @return string
     */
     function getCreationDate(){
		return ($this->_creationDate);
	}

    /*
     * set last modified date
     *
     * @return void
     */
     function setLastModified($date){
        $this->_lastModified = $date;
    }

    /*
     * get last modified date generated automaticaly when the profile is updated
     *
     * @return string
     */
     function getLastModified(){
        return ($this->_lastModified);
    }

    /*
     * set GrandeAreaID
     *
     * @param integer $param
     * @return void
     */
	 function setGrandeAreaID($param){
		$this->_id_grande_area = $param;
	}

    /*
     * get GrandeAreaID
     *
     * @return integer
     */
     function getGrandeAreaID(){
		return ($this->_id_grande_area);
	}

    /*
     * set SubAreaID
     *
     * @param integer $param
     * @return void
     */
	 function setSubAreaID($param){
		$this->_id_sub_area = $param;
	}
    /*
     * get SubAreaID
     *
     * @return integer
     */
     function getSubAreaID(){
		return ($this->_id_sub_area);
	}

    /*
     * set Profile Default Status
     *
     * @param integer $param
     * @return void
     */
     function setProfileDefault($param){
		$this->_profileDefault = $param;
	}
    /*
     * get Profile Default Status
     *
     * @return integer
     */
     function getProfileDefault(){
		return ($this->_profileDefault);
	}
}
?>