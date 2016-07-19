<?php
/**
 * User Links Class
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
 * Links Class
 *
 * This class is the representation of the link object that will be used to
 * handle the user links in user links service.
 */
class Links {

    /**
     * Set link ID
     *
     * @param string $value
     */
    function setLinkID($value){
        $this->_data['link_id'] = $value;
    }

    /**
     * Get link ID
     *
     * @return <type>
     */
    function getLinkID(){
        return $this->_data['link_id'];
    }

    /**
     * Set user ID
     *
     * @param string $value user mail
     */
    function setUserID($value){
        $this->_data['user_id'] = $value;
    }

    /**
     * Get user ID
     *
     * @return string user mail
     */
    function getUserID(){
        return $this->_data['user_id'];
    }

    /**
     * Set link name
     *
     * @param string $value
     */
    function setName($value){
        $this->_data['name'] = $value;
    }

    /**
     * Get link name
     *
     * @return string
     */
    function getName(){
        return $this->_data['name'];
    }

    /**
     * Set URL
     *
     * @param string $value
     */
    function setUrl($value){

        if(!preg_match(REGEXP_HTTP, $value)){
            $value = 'http://' . $value;
        }

        $this->_data['url'] = $value;
    }

    /**
     * Get URL
     *
     * @return string
     */
    function getUrl(){
        return $this->_data['url'];
    }

    /**
     * Set link description
     *
     * @param string $value
     */
    function setDescription($value){
        $this->_data['description'] = $value;
    }

    /**
     * Get link description
     *
     * @return string
     */
    function getDescription(){
        return $this->_data['description'];
    }

    /**
     * Set the flag to show the link in a highlights portlet
     *
     * @param boolean $value
     */
    function setInHome($value){
        $this->_data['in_home'] = $value;
    }

    /**
     * Get the flag that define if the link should be shown in a highlight
     * portlet
     *
     * @return boolean
     */
    function getInHome(){
        return $this->_data['in_home'];
    }

    /**
     * Set a link rate
     *
     * @param int $value (0|1|2|3)
     */
    function setRate($value){
        $this->_data['rate'] = $value;
    }

    /**
     * Get a link rate
     *
     * @return int (0|1|2|3)
     */
    function getRate(){
        return $this->_data['rate'];
    }
}
?>
