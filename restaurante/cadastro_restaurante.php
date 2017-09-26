<html>
     <head>
        <?php include('../includes.php'); ?>
    </hed>
    <body>
        <div class="col-md-2 col-md-offset-5">
            <h3>Cadastrar restaurante</h3>
            <form action="/index.php" method="post" target="_blank">
                <label>Nome do restaurante: </label><input type="text" class="form-control" name="name"><br>
                <label>Cnpj: </label><input type="text" name="email"><br>
                <input type="checkbox" class="form-check-input" name="come_local" value="ncome_local">Pode comer no local<br>
                <input type="checkbox" class="form-check-input" name="entrega_meio" value="entrega_meio">Pode entregar em algum outro lugar<br>
                <input type="checkbox" class="form-check-input" name="entrega_fim" value="entrega_fim">Pode entregar na casa<br>
                <input type="checkbox" class="form-check-input" name="aceita_cartao" value="aceita_cartao">Aceita cartão<br>
                <input type="submit" class="btn btn-primary" value="Cadastrar">
            </form>
        </div>
    </body>
</html>