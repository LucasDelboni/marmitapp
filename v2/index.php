<?php
include('../valida_session.php');

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
if(!isset($_SESSION[email])){
    if($nome!=null && $email !=null && $senha!=null){
        cadastraUsuario($email, $senha, $nome);
        header("Location: /v2/login.php");
    }
    else{
        header("Location: /v2/login.php");
    }
}
?>
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
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all"> 
<!-- //Custom Theme files -->
<!-- font-awesome-icons -->
<link rel="stylesheet" href="css/font-awesome.min.css" />
<!-- //font-awesome-icons -->
<!-- js -->
<script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>
<!-- //js -->
<!-- web-fonts -->  
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Bitter:400,400i,700&subset=latin-ext" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body class="bg">
<!-- nav -->
	<div class="nav_comentario">
		<div class="overlay"></div>
		<div class="mobile-side-menu">
			<ul>
				<li><a href="lista_restaurantes.php"><i class="fa fa-cutlery" aria-hidden="true"></i>Restaurantes</a></li>
				<li><a href="contact.html"><i class="fa fa-envelope" aria-hidden="true"></i>Entre em contato</a></li>
				<li><a href="index.html"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li>
			</ul>
		</div>
		<div class="navbar">
			<div class="agile_container">
				<div class="w3_agile_nav_comentario_left">
					<div class="toggleMenu">
						<a href="#"> Menu </a>
					</div>
				</div>
				<!--<div class="w3_agile_nav_comentario_right">
					<ul class="wthree_social_icons">
						<li><a href="#" class="w3_agileits_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agileits_google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li><a href="#" class="w3_agileits_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					</ul>
				</div>-->
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/slide-from-top.js"></script> 
	<script type="text/javascript">
      $(document).ready(function() {
         $('.mobile-side-menu').slideFromTop({
            menuBtn: $('.toggleMenu'),
            navbar: $('.navbar'),
            menuSpeed: 500,
            bodyOverlay: $('.overlay')
         });
      });
    </script>
<!-- //nav -->
<!-- logo -->
	<div class="agileinfo_logo">
		<div class="agile_container">
			<h1><a href="comentario.html"><img src="images/logo.png" class="logo"/>MarmitAPP</a></h1>
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
					<li><i class="fa fa-home" aria-hidden="true"></i><a href="comentario.html">Home</a><span>/</span></li>
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
			<h3 class="agileits_head w3_agileits_head">Restaurantes<i class="fa fa-cutlery" aria-hidden="true"></i></h3>
			<div class="w3_agileits_team_grids">
				
				<?php
                    $restaurantes = consultaTodosRestaurantes();
                    foreach ($restaurantes as $restaurante) {
                ?>
		                <div class="agile_team_grid">
							<img src=<?php echo "images/$restaurante[foto].jpg";?> alt=" " class="img-responsive" />
							<h3><a href=<?php echo "/restaurante.php?restaurante=$restaurante[restaurante]";?>><?php echo $restaurante[nome];?></a></h3>
							<h4><a href=<?php echo "restaurante.php?restaurante=$restaurante[restaurante]";?>>Veja os pratos</a></h4>
							<h4><a href=<?php echo "comentario.php?restaurante=$restaurante[restaurante]";?>>Veja as reviews</a></h4>
						</div>
                
                <?php
                    }
                ?>
				<div class="clearfix"> </div>
			</div>
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