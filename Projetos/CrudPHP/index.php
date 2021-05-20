<?php
   include "BD/conexaoBd.php";

        echo "<br>";   
        echo "<strong>Listando dados:</strong>";
        echo "<br>";
        
        $sql = 'select f.cod_empresa, e.nome, e.cnpj, f.cod_funcionario,f.nomefuncionario,
                        f.datanascimento, f.cpfcic, f.mae, f.dataadmissao,f.datademissao,
                        f.demrais, f.demcaged, f.demfgts, f.dataopcao
                        from dpcuca.funcion f
                        left join dpcuca.empresas e on (e.id_empresa = f.cod_empresa)
                        where  f.nomefuncionario like    \'%JOHNNY%\'
                        order by datademissao';

            
            foreach ($conn->query($sql) as $row) {
        
                echo $row['cod_empresa'] . "\t";
                echo $row['nome'] . "\t";
                echo $row['cnpj'] . "\t";
                echo $row['cod_funcionario'] . "\t";
                echo $row['nomefuncionario'] . "\t";
        
        
                echo $row['dataadmissao'] . "\t";
                echo $row['datademissao'] . "\t";
        
                echo $row['demrais'] . "\t";
                echo $row['demcaged'] . "\t";
                echo $row['demfgts'] . "\t";
                echo $row['dataopcao'] . "\n";
        
                echo "<br>";
            }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/styles.css">
    <script src="JavaScript/scripts.js"></script>
    <title>Sistema Carmelino</title>

</head>

<body>
    
<h1>SISTEMA CARMELINO - Funções disponíveis</h1>

        <div class="funcao1">
            <form action="index.php" method="POST" name="form">
                    <h2>Consultar Funcionário:</h2>
                    
                    <label for="txtNome">NOME:</label>
                    <input type="text" name="txtNome" placeholder="Digite o nome completo ou parte do nome." required>
        
                    <div>
                        <input type="submit" name="btnConsultar" value="Consultar" onclick="listarInformacoes();">
                    </div>
            </form>
        </div>

        <!--
        <div class="funcao2">
            <form action="" method="POST">
                    <h2>Conferir Verbas:</h2>
                    
                    <label for="txtVerba">VERBA:</label>
                    <input type="text" name="txtVerba" placeholder="Digite o código da verba." required>
        
                    <div>
                        <input type="submit" value="Consultar">
                    </div>
        -->
            </form>
        </div>

</body>

</html>