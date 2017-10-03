<?php
include('valida_session.php');

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
if(!isset($_SESSION[email])){
    if($nome!=null && $email !=null && $senha!=null){
        cadastraUsuario($email, $senha, $nome);
        header("Location: login.php");
    }
    else{
        header("Location: login.php");
    }
}
?>
<html>
    <head>
        <?php 
            include('includes.php');
        ?>
    </head>
    <body>
        <div class="bottom-menu">
            <a href="#home">Home</a>
            <a href="#news">News</a>
            <a href="#contact">Contact</a>
            <a href="#about">About</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
        <div class="container">
            <ul class="pager">
                <li><a href="restaurante/cadastro_restaurante.php">Cadastrar restaurante</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
            
            <!-- <p><?= $_SESSION[email] ?></p>
           <a href="lista_restaurantes.php">Ver restaurantes cadastrados</a>-->
            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">RESTAURANTES DISPONÍVEIS: </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <!-- <th>Foto</th> -->
                                    <th>Comentários</th>
                                </tr>
                            </thead>
                            <tbody>
                    
                            <?php
                                    $restaurantes = consultaTodosRestaurantes();
                                    foreach ($restaurantes as $restaurante) {
                                ?>
                                     <tr class="active">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            
            
        </div>
    </body>
</html>