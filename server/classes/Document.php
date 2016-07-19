<?php
/**
 * Document Class
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
 * Document class
 */
class Document {

    /**
     * Constructor
     */
    public function Document(){}

    /**
     * Set document ID
     * @param string $value
     */
    public function setDocID($value){
        $this->_data['docID'] = $value;
    }

    /**
     * Get document ID
     * @return string
     */
    public function getDocID(){
        return $this->_data['docID'];
    }

    /**
     * Set source ID
     * @param string $value
     */
    public function setSrcID($value){
        $this->_data['srcID'] = $value;
    }

    /**
     * Get source ID
     * @return string
     */
    public function getSrcID(){
        return $this->_data['srcID'];
    }

    /**
     * Set publication date
     * @param string $value
     */
    public function setPublicationDate($value){
        $this->_data['publication_date'] = $value;
    }

    /**
     * Get publication date
     * @return string
     */
    public function getPublicationDate(){
        return $this->_data['publication_date'];
    }

    /**
     * Set similarity relevance number
     * @param float $value
     */
    public function setRelevance($value){
        $this->_data['relevance'] = $value;
    }

    /**
     * Get similarity relevance number
     * @return float
     */
    public function getRelevance(){
        return $this->_data['relevance'];
    }

    /**
     * Set document URL
     * @param string $value
     */
    public function setDocURL($value){

        if(!preg_match(REGEXP_HTTP, $value)){
            $value = 'http://' . $value;
        }

        $this->_data['URL'] = $value;
    }

    /**
     * Get document URL
     * @return string
     */
    public function getDocURL(){
        return $this->_data['URL'];
    }

    /**
     * Set document title
     * @param string $value
     */
    public function setDocTitle($value){
        $this->_data['docTitle'] = $value;
    }

    /**
     * Get document title
     * @return string
     */
    public function getDocTitle(){
        return $this->_data['docTitle'];
    }

    /**
     * Set serial name
     * @param string $value
     */
    public function setSerial($value){
        $this->_data['serial'] = $value;
    }

    /**
     * Get serial name
     * @return string
     */
    public function getSerial(){
        return $this->_data['serial'];
    }

    /**
     * Set serial volume number
     * @param string $value
     */
    public function setVolume($value){
        $this->_data['vol'] = $value;
    }

    /**
     * Get serial volume number
     * @return string
     */
    public function getVolume(){
        return $this->_data['vol'];
    }

    /**
     * Set serial number
     * @param string $value
     */
    public function setNumber($value){
        $this->_data['n'] = $value;
    }

    /**
     * Get serial number
     * @return string
     */
    public function getSuppl(){
        return $this->_data['s'];
    }

    /**
     * Set serial supplement number
     * @param string $value
     */
    public function setSuppl($value){
        $this->_data['s'] = $value;
    }

    /**
     * Get serial supplement number
     * @return string
     */
    public function getNumber(){
        return $this->_data['n'];
    }

    /**
     * Set serial year
     * @param int $value
     */
    public function setYear($value){
        $this->_data['year'] = $value;
    }

    /**
     * Get serial year
     * @return int
     */
    public function getYear(){
        return $this->_data['year'];
    }

    /**
     * Set authors
     * @param string|array $value
     */
    public function setAuthors($value){
        $this->_data['authors'] = mysql_escape_string($value);
    }

    /**
     * Get authors
     * @return string|array
     */
    public function getAuthors(){
        return $this->_data['authors'];
    }

    /**
     * Set document keywords
     * @param string $value
     */
    public function setKeywords($value){
        $this->_data['keywords'] = mysql_escape_string($value);
    }

    /**
     * Get document keywords
     * @return string
     */
    public function getKeywords(){
        return $this->_data['keywords'];
    }
}
?>