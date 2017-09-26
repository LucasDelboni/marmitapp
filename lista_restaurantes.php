<!DOCTYPE html>
<html>
    <head>
        <?php 
            include('includes.php'); 
            include('valida_session.php');
        ?>
    </head>
    <body>
        <?php
            if($_SESSION[email]  == null){
                 header("Location: login.php"); 
            }
        ?>
        
        
        <div class="container">
             <a href="index.php">Voltar</a>
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
    </body>
</html>