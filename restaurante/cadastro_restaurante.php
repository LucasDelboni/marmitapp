<?php
include('../valida_session.php');

if (!empty($_POST[submit])) {
    $nome_restaurante = $_POST["nome"];
    $cnpj = $_POST["cnpj"];
    $come_local = $_POST["come_local"] || '0';
    $entrega_meio = $_POST[entrega_meio] || '0';
    $entrega_fim = $_POST[entrega_fim] || '0';
    $aceita_cartao = $_POST[aceita_cartao] || '0';
    
    var_dump($nome_restaurante);
    var_dump($cnpj);
    var_dump($come_local);
    var_dump($entrega_meio);
    var_dump($entrega_fim);
    var_dump($aceita_cartao);
    
    if(isset($nome_restaurante) && 
        isset($come_local)  && 
        isset($entrega_meio) && 
        isset($entrega_fim) &&
        isset($aceita_cartao) ){
            cadastrarRestaurante($_SESSION[id_usuario], $nome_restaurante, $cnpj, $come_local, $entrega_meio, $entrega_fim, $aceita_cartao, null);
            header("Location: ../index.php");
    }
}
?>
<html>
     <head>
        <?php include('../includes.php'); ?>
    </hed>
    <body>
        <ul class="pager">
             <li><a href="../index.php">Voltar</a></li>
             <li><a href="../logout.php">Sair</a></li>
        </ul>
        
        
        <!-- <div class="col-md-2 col-md-offset-5"> -->
        <div class="container">
            <form class="form-horizontal" action="cadastro_restaurante.php" method="post">
                <fieldset>
                    <legend>Cadastrar restaurante</legend>
                    <div class="form-group">
                        <label for="nome" class="col-lg-2 control-label">Nome do restaurante: </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="RESTAURANTE PONTO COM">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cnpj" class="col-lg-2 control-label">Cnpj: </label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="cnpj" name="cnpj" placeholder="85834723000149">
                        </div>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="come_local" value="1">Pode comer no local
                        </label>
                    </div>
                    
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="entrega_meio" value="1">Pode entregar em algum outro lugar
                        </label>
                    </div>
                    
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="entrega_fim" value="1">Pode entregar na casa
                        </label>
                    </div>
                    
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="aceita_cartao" value="1">Aceita cartão<br>
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button value="Cadastrar" name='submit' type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </body>
</html>