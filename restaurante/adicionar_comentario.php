<?php
include('../valida_session.php');

if (!empty($_POST[submit])) {
    $comentario = $_POST[comentario];
    $nota = $_POST[nota];
    $restaurante = $_POST[restaurante];
    
    if(isset($comentario) && 
        isset($nota) &&
        isset($restaurante) ){
            insereComentarioNota($_SESSION[id_usuario], $restaurante, $comentario, $nota);
            
            header("Location: lista_comentarios.php?restaurante=$restaurante"); 
    }
}
?>
<html>
     <head>
        <?php include('../includes.php'); ?>
    </hed>
    <body>
        <ul class="pager">
            <li> <a href="lista_comentarios.php?restaurante=<?= $_GET[restaurante] ?>">Voltar</a></li>
            <li> <a href="../logout.php">Sair</a></li>
        </ul>
       
        <div class="container">
            <form class="form-horizontal" action="adicionar_comentario.php" method="post">
                <fieldset>
                    <legend>Comentar</legend>
                    <div class="form-group">
                        <label for="comentario" class="col-lg-2 control-label">Comentário: </label>
                        <div class="col-lg-10">
                            <textarea name="comentario" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="noeta" class="col-lg-2 control-label">Nota: </label>
                        <div class="col-lg-10">
                            <input type="number" min="0" max="10" name="nota">
                        </div>
                    </div>
                   <input type='hidden' name="restaurante" value='<?= $_GET[restaurante] ?>'></input>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <input type="submit" class="btn btn-primary" value="Comentar" name='submit'>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </body>
</html>