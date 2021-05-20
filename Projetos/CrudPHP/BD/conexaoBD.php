<?php

//Constantes com as credencias de acesso ao banco de dados
define('HOST', '192.168.0.1');
define('USER', 'CucaPost');
define('PASS', ' ');
define('DBNAME', 'dpcuca');
define('PORT', '5432');

//Conexao com banco de dados usando o PDO e a porta do banco de dados
//Utilizar o Try/Catch para verificar a conexao.

try {

    $conn = new pdo('pgsql:host=' . HOST . ';port=' . PORT . ';dbname=' . DBNAME, USER, PASS);
    //echo "Conexao com banco de dados realizada com sucesso.";
} catch (PDOException $e) {
    echo "Erro: Conexao com banco de dados nao foi realizada com sucesso. Erro gerado " . $e->getMessage();
}
?>
