<?php
include('../valida_session.php');

if (!empty($_POST[submit])) {
    $nome_restaurante = $_POST["nome"];
    $cnpj = $_POST["cnpj"];
    $come_local = $_POST["come_local"] || '0';
    $entrega_meio = $_POST[entrega_meio] || '0';
    $entrega_fim = $_POST[entrega_fim] || '0';
    $aceita_cartao = $_POST[aceita_cartao] || '0';
    
    if(isset($nome_restaurante) && 
        isset($come_local)  && 
        isset($entrega_meio) && 
        isset($entrega_fim) &&
        isset($aceita_cartao) ){
            cadastrarRestaurante($_SESSION[id_usuario], $nome_restaurante, $cnpj, $come_local, $entrega_meio, $entrega_fim, $aceita_cartao, null);
    }
}
?>
<html>
     <head>
        <?php include('../includes.php'); ?>
    </hed>
    <body>
        <a href="../logout.php">Sair</a>
        <div class="col-md-2 col-md-offset-5">
            <h3>Cadastrar restaurante</h3>
            <form action="cadastro_restaurante.php" method="post">
                <label>Nome do restaurante: </label><input type="text" class="form-control" name="nome"><br>
                <label>Cnpj: </label><input type="text" name="cnpj"><br>
                <input type="checkbox" class="form-check-input" name="come_local" value="1">Pode comer no local<br>
                <input type="checkbox" class="form-check-input" name="entrega_meio" value="1o">Pode entregar em algum outro lugar<br>
                <input type="checkbox" class="form-check-input" name="entrega_fim" value="1">Pode entregar na casa<br>
                <input type="checkbox" class="form-check-input" name="aceita_cartao" value="1">Aceita cartão<br>
                <input type="submit" class="btn btn-primary" value="Cadastrar" name='submit'>
            </form>
        </div>
    </body>
</html>