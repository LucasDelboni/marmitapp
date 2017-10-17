<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
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
<?php
	//include('../queries.php');
	include('../valida_session.php');
	$id_restaurante = $_GET[restaurante];
?>
</head>
<body class="bg">
	<?php 
		include("menu.php");
	?>
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
					<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>/</span></li>
					<li><i class="fa fa-cutlery" aria-hidden="true"></i>Pratos</li>
				</ul>
			</div>
			<div class="w3layouts_breadcrumbs_right">
				<h3>Menu</h3>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- menu -->
	<div class="menu">
		<div class="container">	
			<div class="w3_agileits_steak">
				<div class="w3ls_sandwich_para"><img src="images/20.jpg" alt=" " class="img-responsive" /></div>
				<h3 class="w3l_sandwich">Pratos</h3>
				<p class="agileits_sandwich_para">Amigos que já comeram aqui: 
                <?php
                    foreach (consultaAmigosNoRestaurante(1,$id_restaurante) as $amigos) {
                       echo "$amigos[nome]    ";
                    }
                ?>
                </p>
				<div class="agileinfo_sandwiches">
					
				<?php
                    $id_restaurante = $_GET["restaurante"];
                    foreach (pratosPorRestaurante($id_restaurante) as $prato) {
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
                </table>
					
					
				
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
<!-- //menu -->
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
				</div>
				<div class="clearfix"> </div>
			</div>-->
			<div class="w3_agile_copyright">	
				<p>&copy; 2017 MamitApp | Design by <a href="http://w3layouts.com/">W3layouts</a>, coded by MarmitApp</p>
			</div>
		</div>
	</div>
<!-- //footer -->
</body>
</html>