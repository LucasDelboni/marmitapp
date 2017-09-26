<html>
    <head>
        <?php include('includes.php'); ?>
    </hed>
    <body>
        <div class="col-md-2 col-md-offset-5">
            <h3>Cadastrar usuário</h3>
            <form action="/cadastro_usuario.php" method="post">
                <div class="form-group">
                    <label>Nome completo: </label><input type="text" class="form-control" name="nome"><br>
                    <label>Email: </label><input type="text" class="form-control" name="email"><br>
                    <label>Senha: </label><input type="password" class="form-control" name="senha"><br>
                </div>
                <input type="submit" class="btn btn-primary" value="Cadastrar">
            </form>
        </div>
    </body>
</html>