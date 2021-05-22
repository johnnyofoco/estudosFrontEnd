<?php

class Conexao{
    private $hostname = "localhost";
    private $dbname = "db";
    private $username = "postgres";
    private $pass = "password";

    private $db_conn = pg_connect(" host = $hostname dbname = $dbname user = $username password = $pass ");

    

    function open(){
        return this->$db_conn;
    }
}

/*
class Conexao{

    private $_dbHostname = "localhost";
    private $_dbName = "postgres";
    private $_dbUsername = "postgres";
    private $_dbPassword = "";
    private $_con;

    public function __construct(){
        try {
            $this->_con = new PDO("pgsql:host=$this->_dbHostname;dbname=$this->_dbName", $this->_dbUsername, $this->_dbPassword);
            $this->_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conectado com sucesso.";
        } catch (PDOException $e) {
            echo "<h1>Ops, algo deu errado: " . $e->getMessage() . "</h1>";
            echo "<pre>";
            echo print_r($e);
        }
    }

    // return Connection
    public function open(){
        return $this->_con;
    }
}*/
?>