<?php
/**
 * UserDirectory Class
 *
 * @package     Plataforma de Serviços da BVS
 * @author      Gustavo Fonseca (gustavo.fonseca@bireme.org)
 * @copyright   BIREME
 *
 */

/*
 * Edit this file in UTF-8 - Test String "áéíóú"
 */

class UserDirectory {
    private $_data = array();

    /**
     * Set directory ID
     *
     * @param int $value
     */
    public function setDirID($value){
        $this->_data['dirID'] = $value;
    }

    /**
     * Get directory ID
     *
     * @return int
     */
    public function getDirID(){
        return $this->_data['dirID'];
    }

    /**
     * Set directory name
     *
     * @param string $value
     */
    public function setDirName($value){
        $this->_data['name'] = $value;
    }

    /**
     * Get directory name
     *
     * @return string
     */
    public function getDirName(){
        return $this->_data['name'];
    }

    /**
     * Set directory status Offline On|Off
     *
     * @param int $value 1 True, 0 False
     */
    public function setOffline($value){
        $this->_data['offline'] = $value;
    }

    /**
     * Get directory status
     *
     * @return int $value 1 True, 0 False
     */
    public function getOffline(){
        return $this->_data['offline'];
    }

    /**
     * Set directory's owner ID
     *
     * @param string $value Owners userID
     */
    public function setUserID($value){
        $this->_data['userID'] = $value;
    }

    /**
     * Get directory's owner ID
     *
     * @return string $value Owners userID
     */
    public function getUserID(){
        return $this->_data['userID'];
    }

    /*
     * Set creation date
     *
     * @param string $value
     */
    public function setCreationDate($value){
        $this->_data['creation_date'] = $value;
    }

    /*
     * Get creation date
     *
     * @return string
     */
    public function getCreationDate(){
        return $this->_data['creation_date'];
    }

    /*
     * Set last modified date
     *
     * @param string $value
     */
    public function setLastModified($value){
        $this->_data['last_modified'] = $value;
    }

    /*
     * Get last modified date
     *
     * @return string
     */
    public function getLastModified(){
        return $this->_data['last_modified'];
    }

    /**
     * Set directory public status
     *
     * @param boolean
     */
    public function setPublic($value){
        if($value == true){
            $this->_data['public'] = 1;
        }elseif($value == false){
            $this->_data['public'] = 0;
        }
    }

    /**
     * Get directory public status
     *
     * @return boolean
     */
    public function getPublic(){
        return $this->_data['public'] === 1 ? true : false;
    }
}
?>