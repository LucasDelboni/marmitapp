<!DOCTYPE html>
<html>
    <head>
        <?php 
            include('../includes.php'); 
            include('../valida_session.php');
        ?>
    </head>
    <body>
        <a href="../index.php">Voltar</a>
        <div class="table-responsive container">
            <table class="table">
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                </tr>
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
            </table>
        </div>
    </body>
</html>