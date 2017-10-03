<!DOCTYPE html>
<html>
    <head>
        <?php 
            include('../includes.php'); 
            include('../valida_session.php');
            
            $id_restaurante = $_GET[restaurante];
        ?>
    </head>
    <body>
        <div class="container">
            <ul class="pager">
                <li><a href="../index.php">Voltar</a></li>
                <li><a href="../logout.php">Sair</a></li>
            </ul>
             
        
            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo consultaNomeRestaurante($id_restaurante)[nome];?></h3>
                </div>
                <div class="panel-body">
                    <div class="well">
                        <p>Amigos que pediram nesse restaurante:</p>
                        <ul>
                            <?php
                                foreach (consultaAmigosNoRestaurante($_SESSION[id_usuario],$id_restaurante) as $amigos) {
                                   echo "<li>$amigos[nome]</li>";
                                }
                            ?>
                        </ul>
                    </div>
                 <h3>Pratos: </h3>
                    <div class="table-responsive">
                       
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Preço</th>
                                </tr>
                            </thead>
                            <tbody>
                    
                            <?php
                                $id_restaurante = $_GET["restaurante"];
                                foreach (pratosPorRestaurante($id_restaurante) as $prato) {
                            ?>
                                <tr>
                                    <td><?php echo $prato[nome]?></td>
                                    <td><?php echo $prato[preco]?></td>
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