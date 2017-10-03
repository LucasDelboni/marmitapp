<?php
include('queries.php');
if (!empty($_POST[submit])) {
    session_set_cookie_params(3600);
    session_start();
    $resposta = login($_POST[email], $_POST[senha]);
    if(isset($resposta)){
        $_SESSION[id_usuario] = $resposta[id];
        $_SESSION[email] = $_POST[email];
        $_SESSION[senha] = $_POST[senha];
        header("Location: /");
    }
}
?>

<html>
    <head>
        <?php include('includes.php'); ?>
    </hed>
    <body>
        <div class="col-md-2 col-md-offset-5">
            <h3>Entrar</h3>
            <form action="/login.php" method="post">
                <div class="form-group">
                    <label>Email: </label><input type="text" class="form-control" name="email"><br>
                    <label>Senha: </label><input type="password" class="form-control" name="senha"><br>
                </div>
                <input type="submit" class="btn btn-primary" value="Entrar" name='submit'>
            </form>
        </div>
    </body>
</html>