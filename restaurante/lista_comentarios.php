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
            
            $id_restaurante = $_GET[restaurante];
        ?>
        
         
           
        <div class="container">
            <ul class="pager">
                <li><a href="../index.php">Voltar</a></li>
                <li> <a href="../logout.php">Sair</a></li>
            </ul>
            
            <div class="panel panel-primary">
                <div class="panel-heading">
                     <h3 class="panel-title">Comentários do: <?php echo consultaNomeRestaurante($id_restaurante)[nome];?></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th>Comentário</th>
                                    <th>Nota</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach (consultaComentariosRestaurante($id_restaurante) as $prato) {
                                ?>
                                     <tr class="active">
                                        <td>
                                           <?php echo $prato[comentario]?>
                                        </td>
                                        <td>
                                            <?php echo $prato[nota]?>
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

            <a class="btn btn-primary" href=<?php echo "/restaurante/adicionar_comentario.php?restaurante=$id_restaurante";?>>Comentar</a>
        </div>
    </body>
</html>