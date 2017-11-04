<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Mamitapp: Peca sua marmita em qualquer lugar pelo menor preco</title> 
    <!-- For-Mobile-Apps-and-Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Cookhouse Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, SmartPhone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //For-Mobile-Apps-and-Meta-Tags -->
    <!-- Custom Theme files -->
    <link href="../css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="all"> 
    <!-- //Custom Theme files -->
    <!-- font-awesome-icons -->
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <!-- //font-awesome-icons -->
    <!-- js -->
    <script type='text/javascript' src='../js/jquery-2.2.3.min.js'></script>
    <!-- //js -->
    <!-- web-fonts -->  
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Bitter:400,400i,700&subset=latin-ext" rel="stylesheet">
    <!-- //web-fonts -->
    
    <?php
    include("../../valida_session.php");
    $id_usuario = $_SESSION[id_usuario];
    
    if (!empty($_POST[submit])) {
        $nome_prato = $_POST[nome_prato];
        $foto = $_POST[foto];
        $ingrediente = $_POST[ingrediente];
        $preco = $_POST[preco];
        
        if(isset($nome_prato) && 
            isset($foto)  && 
            isset($ingrediente) && 
            isset($preco) ){
                criaPratoRestaurante($id_usuario, $nome_prato,$foto, $ingrediente, $preco );
                header("Location: /v2/restaurante/criar_prato.php");
        }
    }
    
    if(!temRestaurante($_SESSION[id_usuario])){
        header("Location: /v2/restaurante/index.php");
    }
?>
</head>
<body class="bg">
	<?php 
		include("../menu.php");
	?>
<!-- logo -->
	<div class="agileinfo_logo">
		<div class="agile_container">
			<h1><a href="#"><img src="images/logo.png" class="logo"/>MarmitAPP</a></h1>
		</div>
	</div>
<!-- //logo -->
<!-- banner1 -->
	<div class="banner1">
		<div class="container">
		</div>
	</div>
<!-- //banner1 -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="w3layouts_breadcrumbs_left">
				<ul>
					<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>/</span></li>
					<li><i class="fa fa-users" aria-hidden="true"></i>Restaurantes</li>
				</ul>
			</div>
			<div class="w3layouts_breadcrumbs_right">
				<h3>Restaurantes</h3>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="menu">
		<div class="container">
		    <h3 class="agileits_head w3_agileits_head">Seus pratos<i class="fa fa-cutlery" aria-hidden="true"></i></h3>
			<div class="agileinfo_sandwiches">
				<?php
                    $id_restaurante = $_GET["restaurante"];
                    foreach (pratosPorRestaurante($id_usuario) as $prato) {
                ?>
                    	<div class="agile_team_grid">
    						<div class="wthree_sandwich_grid">
    							<h4><?php echo $prato[nome]?>--- <span>R$: <?php echo $prato[preco]?></span></h4>
    							<p>
    							<?php
    								$lista_ingredientes = explode(";",$prato[ingredientes]);
    								foreach ($lista_ingredientes as $ingrediente){
    									echo $ingrediente;
    									echo "<br/>";
    								}
    							?>
    							</p>
    						</div>
							
						</div>
                <?php
                    }
                ?>
				<div class="clearfix"> </div>
			</div>
			
			<h3 class="agileits_head w3_agileits_head">Crie um novo prato<i class="fa fa-cutlery" aria-hidden="true"></i></h3>
			<form class="form-horizontal" action="criar_prato.php" method="post">
                <fieldset>
                    <legend>Criar novo prato</legend>
                    <div class="form-group">
                        <label for="nome_prato" class="col-lg-2 control-label">Nome do prato: </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="nome_prato" name="nome_prato" placeholder="Marmita de contra filé">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ingrediente" class="col-lg-2 control-label">Ingredientes: </label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="ingrediente" name="ingrediente" placeholder="Arroz, feijão, batata frita">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="foto" class="col-lg-2 control-label">Foto: </label>
                        <div class="col-lg-10">
                            <input type="file" class="form-control" id="foto" name="foto" placeholder="Arroz, feijão, batata frita">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="preco" class="col-lg-2 control-label">Preço: </label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="preco" name="preco" placeholder="4,50">
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button value="Cadastrar" name='submit' type="submit" class="btn btn-primary">Criar</button>
                        </div>
                    </div>
                </fieldset>
            </form>
            
            
		</div>
	</div>
<!-- single -->
<!-- footer -->
	<div class="footer">
		<div class="container">
			<!--<div class="w3ls_footer_grid">
				<div class="w3ls_footer_grid_left">
					<div class="w3ls_footer_grid_left1">
						<h2>Follow Us</h2>
						<div class="w3ls_footer_grid_left1_pos">
							<ul>
								<li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i>Facebook</a></li>
								<li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i>Twitter</a></li>
								<li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i>Google+</a></li>
								<li><a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i>Instagram</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="w3ls_footer_grid_right">
					<ul class="agileits_w3layouts_footer">
						<li><a href="menu.html">Our Menu</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="lista_restaurantes.php">About</a></li>
					</ul>
				</div>-->
				<div class="clearfix"> </div>
			</div>
			<div class="w3_agile_copyright">	
				<p>&copy; 2017 MamitApp | Design by <a href="http://w3layouts.com/">W3layouts</a>, coded by MarmitApp</p>
			</div>
		</div>
	</div>
<!-- //footer -->
</body>
</html>	