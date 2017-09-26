<!DOCTYPE html>
<html>
    <head>
        <?php 
            include('includes.php'); 
            include('queries.php');
        ?>
    </head>
    <body>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Nome</th>
                    <!-- <th>Foto</th> -->
                </tr>
            
        </div>
        <?php
            var_dump(consultaRestaurantes(true, true, true, true));
            foreach (consultaRestaurantes(true, true, true, true) as $restaurante) {
        ?>
            <tr>
                <td><?php echo $restaurante[nome]?></td>
                <!-- <td><?php echo $restaurante[foto]?></td> -->
            </tr>
        <?php
            }
        ?>
        </table>
    </body>
</html>