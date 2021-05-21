<?php
    include "conexaoPostgre.php";
    $minhaConexao = new Conexao();
    $link = $minhaConexao->open();

    $nome = $_POST["txtNome"];
    $email = $_POST["txtEmail"];
    $oper = $_POST["oper"];
    $id = $_POST["acao"];
    if ($oper=="cad"){
        try {
            echo "cadastrando cliente...";
            $resultado = pg_query($link, "insert into cliente(nome, email) values ('$nome', '$email')");
            if (pg_affected_rows($resultado)>0){
                 echo "<br/> Cliente cadastrado com sucesso!<br/>";
            echo "<a href='pg_Entrada_CRUD_Cliente.php'>Consultar Clientes</a>";
            }
        } catch (Exception $e) {
            echo "Não foi possível cadastrar o cliente.\n" + $e->getMessage();
        }
    }
    elseif ($oper=="alt"){
        try {
            echo "alterando cliente...";
            $resultado = pg_query($link, "update cliente set nome='$nome', email='$email' where id=$id");
            if (pg_affected_rows($resultado)>0){
                echo "<br/>Cliente alterado com sucesso!<br/>";
            echo "<a href='pg_Entrada_CRUD_Cliente.php'>Consultar Clientes</a>";
            }
        } catch (Exception $e) {
            echo "Não foi possível alterar os dados do cliente.\n" + $e->getMessage();
        }
    }
    elseif ($oper=="exc"){
        try {
            echo "excluindo cliente $id ...<br/>";
            $resultado = pg_query($link, "delete from cliente where id=$id");
            if (pg_affected_rows($resultado)>=1){
                echo "<br/>Cliente excluido!<br/>";
            }else{
                echo "<br/> Não foi possível excluir o cliente. Existem registros relacionados a ele!<br/>";
            echo "<a href='pg_Entrada_CRUD_Cliente.php'>Consultar Clientes</a>";
            }
        } catch (Exception $e) {
            echo "Não foi possível excluir o cliente.\n" + $e->getMessage();
        }

    }
    //$minhaConexao->close();
