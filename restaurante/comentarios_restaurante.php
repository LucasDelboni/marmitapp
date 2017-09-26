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
                    <th>Comentário</th>
                    <th>Nota</th> -->
                </tr>
                <?php
                    var_dump(consultaComentariosRestaurante(1));
                    foreach (consultaComentariosRestaurante(1) as $prato) {
                ?>
                    <tr>
                        <td><?php echo $prato[comentario]?></td>
                        <td><?php echo $prato[nota]?></td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </body>
</html>