<?php
/**
 * Database BIREME Accounts Connection Class
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
 * Custom exception Database BIREME Accounts Connection Class
 */
class AccountsDBClassException extends Exception{}

/**
 * Database BIREME Accounts Connection Class
 *
 * Handle the main activities to interact with the database.
 */
class AccountsDBClass{
    private $_conn = null;
    private $_host = BIR_ACCOUNTS_DB_HOST;
    private $_user = BIR_ACCOUNTS_DB_USERNAME;
    private $_password = BIR_ACCOUNTS_DB_PASSWORD;
    private $_db = BIR_ACCOUNTS_DB_DBNAME;

    /**
     * Create the connection with the database.
     */
    public function AccountsDBClass(){
        $this->_conn = mysqli_connect($this->_host, $this->_user
            , $this->_password);
        if(!$this->_conn){
            throw new AccountsDBClassException('Err:connect:'.mysql_error());
        }
        if(!mysqli_select_db($this->_conn, $this->_db)){
            throw new AccountsDBClassException('Err:selectDB:'.mysql_error());
        }
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
            throw new AccountsDBClassException('Err:databaseQuery:'.mysqli_error($this->_conn));
        }
        $recordSet = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($recordSet, $row);
        }
        return($recordSet);
    }
}
?>