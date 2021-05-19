<?php

try {
    $conexaoPDO = new PDO("pgsql:host=localhost,dbname=postgres","postgres","");
        echo "Conectado com sucesso!\n";
        echo "<br>";
} catch (PDOException $e) {
        echo $e->getMessage();
}

?>




   
