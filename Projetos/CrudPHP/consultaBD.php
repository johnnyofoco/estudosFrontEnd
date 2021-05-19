<?php
include "conexaoBD.php";


echo "<br>";
    
echo "<strong>Listando dados:</strong>";
echo "<br>";

$sql = 'SELECT id,cpf,nome FROM clientes ORDER BY nome';
foreach ($conexaoPDO->query($sql) as $row) {

echo $row['id'] . "\t";
echo $row['cpf'] . "\t";
echo $row['nome'] . "\n";
echo "<br>";
}


?>