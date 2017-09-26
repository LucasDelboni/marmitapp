<html>
    <head>
        <?php 
            include('includes.php');
            include('queries.php')
        ?>
    </head>
    <body>
       <?php
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            var_dump($email);
            var_dump($nome);
            var_dump($senha);
            var_dump($nome==null);
            if($nome!=null && $email !=null && $senha!=null){
                cadastraUsuario($email, $senha, $nome);
                echo "usuario cadastrado com sucesso";
            }
            
            if($email != null && $senha!=null){
                $id_usuario = login($email,$senha);
                $_SESSION[id_usuario] = $id_usuario;
                echo "usuario logado com sucesso";
            }
            else{
                header("Location: login.php"); 
            }
        ?>
    </body>
</html>