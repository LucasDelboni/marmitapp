<html>
    <head>
        <?php 
            include('includes.php');
            include('valida_session.php');
        ?>
    </head>
    <body>
       <?php
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            if($_SESSION[email]  == null){
                if($nome!=null && $email !=null && $senha!=null){
                    cadastraUsuario($email, $senha, $nome);
                    echo "usuario cadastrado com sucesso";
                }
                else{
                    header("Location: login.php");
                }
            }
        ?>
        <div class="container">
            <a href="logout.php">Sair</a>
            <p><?= $_SESSION[email] ?></p>
            <a href="lista_restaurantes.php">Ver restaurantes cadastrados</a>
            <br/>
            <a href="restaurante/cadastro_restaurante.php">Cadastrar restaurante</a>
            
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Nome</th>
                        <!-- <th>Foto</th> -->
                        <th>Comentários</th>
                    </tr>
                
            
                <?php
                    $restaurantes = consultaTodosRestaurantes();
                    foreach ($restaurantes as $restaurante) {
                ?>
                    <tr>
                        <td>
                            <a href=<?php echo "/restaurante/lista_pratos.php?restaurante=$restaurante[restaurante]";?>><?php echo $restaurante[nome];?></a>
                        </td>
                        <!-- <td><?php echo $restaurante[foto]?></td> -->
                        <td>
                            <a href=<?php echo "/restaurante/lista_comentarios.php?restaurante=$restaurante[restaurante]";?>><button type="button" class="btn btn-info btn-lg glyphicon glyphicon-comment"></button></a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </table>
            </div>
        </div>
    </body>
</html>