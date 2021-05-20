<?php



class Conexao{
    function __construct()
    {   
        $this->conn =
            pg_pconnect('host=localhost port=5432' . 'dbname=postgres user=postgres password=1234')
            or die('Wrong CONN_STRING');
    }

}


?>