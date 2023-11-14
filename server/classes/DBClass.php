<?php
/**
 * Database Connection Class
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

require_once(dirname(__FILE__)."/../config.php");

/**
 * Custom exception Database Connection Class
 */
class DBClassException extends Exception{}

/**
 * Database Connection Class
 *
 * Handle the main activities to interact with the database.
 */
class DBClass{
    private $_conn = null;
    private $_host = DB_HOST;
    private $_user = DB_USERNAME;
    private $_password = DB_PASSWORD;
    private $_db = DB_DBNAME;
    private $_port = DB_PORT;

    /**
     * Create the connection with the database.
     */
    public function __construct(){
        $this->_conn = mysqli_connect($this->_host, $this->_user, $this->_password, $this->_db, $this->_port);
        if(!$this->_conn){
            throw new DBClassException('Err:connect:'.mysqli_error($this->_conn));
        }
        if(!mysqli_select_db($this->_conn, $this->_db)){
            throw new DBClassException('Err:selectDB:'.mysqli_error($this->_conn));
        }
    }

   /**
    * Execute the Insert queries
    *
    * @param  string $query
    * @return int
    */
    public function databaseExecInsert($query){
        /*
         * fixme: need to impove the exceptions returned by the SGBD and return
         * reporter: Fabio Batalha (fabio.santos@bireme.org)
         * date: 20090729
         */
        $result = mysqli_query($this->_conn, $query);
        if(!$result){
            throw new DBClassException('Err:ExecInsert:'.mysqli_error($this->_conn));
        }
        return(mysqli_insert_id($this->_conn));
    }

    /**
     * Execute the Update/Delete queries
     *
     * @param string $query
     * @return int
     */
    public function databaseExecUpdate($query){
        /*
         * fixme: need to impove the exceptions returned by the SGBD and return
         * reporter: Fabio Batalha (fabio.santos@bireme.org)
         * date: 20090729
         */
        $result = mysqli_query($this->_conn, $query);
        if(!$result){
            throw new DBClassException('Err:ExecUpdate:'.mysqli_error($this->_conn));
        }
        return(mysqli_affected_rows($this->_conn));
    }

    /**
     * Execute the Select queries
     * @param string $query
     * @return int
     */
    public function databaseQuery($query){
        /*
         * fixme: need to impove the exceptions returned by the SGBD and return
         * reporter: Fabio Batalha (fabio.santos@bireme.org)
         * date: 20090729
         */
        $result = mysqli_query($this->_conn, $query);
        if(!$result){
            throw new DBClassException('Err:databaseQuery:'.mysqli_error($this->_conn));
        }
        $recordSet = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($recordSet, $row);
        }
        return($recordSet);
    }
}
?>