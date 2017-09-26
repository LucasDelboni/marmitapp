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
        <a href="lista_comentarios.php?restaurante=<?= $_GET[restaurante] ?>">Voltar</a>
        <a href="../logout.php">Sair</a>
        <div class="col-md-2 col-md-offset-5">
            <h3>Comentar</h3>
            <form action="adicionar_comentario.php" method="post">
                <label>Comentário: </label><textarea name="comentario" class="form-control" rows="3"></textarea><br>
                <label>Nota: </label><input type="number" min="0" max="10" name="nota"><br>
                <input type='hidden' name="restaurante" value='<?= $_GET[restaurante] ?>'></input>
                <input type="submit" class="btn btn-primary" value="Cadastrar" name='submit'>
            </form>
        </div>
    </body>
</html>