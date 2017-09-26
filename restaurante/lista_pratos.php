<!DOCTYPE html>
<html>
    <head>
        <?php 
            include('../includes.php'); 
            include('../queries.php');
        ?>
    </head>
    <body>
        <div class="table-responsive container">
            <table class="table">
                <tr>
                    <th>Nome</th>
                    <th>Preço</th> -->
                </tr>
                <?php
                    var_dump(pratosPorRestaurante(1));
                    foreach (pratosPorRestaurante(1) as $prato) {
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