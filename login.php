<?php
/*include('queries.php');

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
}*/
?>

<html>
    <head>
        <?php include('includes.php'); ?>
    </hed>
    <body class="login">
        <div class="col-md-2 col-md-offset-5">
            <div class="banner">
                <img src="assets/images/logo.png" class="logo"></img>
                <span class="text">MarmitAPP</span>
            </div>
            <?php var_dump($_POST);?>
            <div class="form">
                <form action="/login.php" method="POST">
                    <div class="form-group">
                        <label>Email: </label><input type="text" class="form-control" name="email"><br>
                        <label>Senha: </label><input type="password" class="form-control" name="senha"><br>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Entrar" name="submit">
                    </div>
                </form>
            </div>
            <div class="text-center">
                <a href="cadastro_usuario.php">Cadastrar-se</a>
            </div>
        </div>
    </body>
</html>