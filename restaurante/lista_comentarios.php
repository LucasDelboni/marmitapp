<!DOCTYPE html>
<html>
    <head>
        <?php 
            include('../includes.php'); 
            include('../valida_session.php');
        ?>
    </head>
    <body>
        <?php
            if($_SESSION[email]  == null){
                 header("Location: ../login.php"); 
            }
        ?>
        
        
        <div class="container">
            <a href="../index.php">Voltar</a>
            <div class="row">
                <div class="col-xs-6 col-md-6">
                    <p>Comentário</p>
                </div>
                <div class="col-xs-6 col-md-6">
                    <p class='text-right'>Nota</p>
                </div>
            </div>
            <?php
                $id_restaurante = $_GET[restaurante];
                foreach (consultaComentariosRestaurante($id_restaurante) as $prato) {
            ?>
                <hr/>
                <div class="row">
                    <div class="col-xs-10 col-md-9">
                        <?php echo $prato[comentario]?>
                    </div>
                    <div class="col-xs-2 col-md-3">
                        <?php echo $prato[nota]?>
                    </div>
                </div>
            <?php
                }
            ?>
            <a href=<?php echo "/restaurante/adicionar_comentario.php?restaurante=$id_restaurante";?>>Comentar</a>
        </div>
    </body>
</html>