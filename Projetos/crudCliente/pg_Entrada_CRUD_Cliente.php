<!-- ENTRADACLIENTECOMPLETO.PHP -->
<script language="javascript">
    function enviar(acao) {
        document.form.oper.value = acao;
        document.form.submit();
    }

    function preencheCampos(nome, email) {
        document.form.txtNome.value = nome;
        document.form.txtEmail.value = email;
    }
</script>

<?php
include "conexaoPostgre.php";
$minhaConexao = new Conexao();

$link = $minhaConexao;
?>

<form action="pg_crud_ClienteCompleto.php" method="post" name="form">
    <table>
        <tr>
            <td>Nome:</td>
            <td><input type="text" size="37" name="txtNome"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="text" size="37" name="txtEmail"></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="button" name="btnCadastrar" value="Cadastrar" onclick="enviar('cad');">
                <input type="reset" name="btnLimpar" value="Limpar">
            </td>
        </tr>
    </table>
<hr>
<h1>CLIENTES CADASTRADOS</h1>
    <p>
        <input type="button" name="btnAlterar" value="Alterar" onclick="enviar('alt');">
        <input type="button" name="btnExcluir" value="Excluir" onclick="enviar('exc');">
    </p>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Selecao</th>
    </tr>
    <?php
        $resultado = pg_query($link, "Select * from cliente");
        while ($linha = pg_fetch_array($resultado))
            echo "<tr><td>" . $linha['id'] . "</td><td>" . $linha['nome'] . "</td><td>" . $linha['email'] . "</td><td><input type='radio' name='acao' value'" . $linha['id'] . "' onclick=\"preencheCampos('" . $linha['nome'] . "', '".$linha['email'] . "');\"></td>";
                //$minhaConexao->close();
    ?>
</table>
    <input type="hidden" name="oper">    
</form>