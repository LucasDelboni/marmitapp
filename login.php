<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="pt">
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
<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css " />
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
include('queries.php');

if (!empty($_POST[submit])) {
    session_set_cookie_params(3600);
    session_start();
    $resposta = login($_POST[email], $_POST[password]);
    if(isset($resposta)){
        $_SESSION[id_usuario] = $resposta[id];
        $_SESSION[email] = $_POST[email];
        $_SESSION[senha] = $_POST[password];
        header("Location: /index.php");
    }
}
?>
</head>
<body class="bg">
<!-- logo -->
	<div class="agileinfo_logo">
		<div class="agile_container">
			<h1><a href="comentario.html"><img src="images/logo.png" class="logo"/>MarmitAPP</a></h1>
		</div>
	</div>
<!-- //logo -->





<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="w3layouts_breadcrumbs_left">
				<ul>
					<li><i class="fa fa-home" aria-hidden="true"></i><a href="comentario.html">Home</a><span>/</span></li>
					<li><i class="fa fa-sign-in" aria-hidden="true"></i>Entrar / Cadastrar-se</li>
				</ul>
			</div>
			<div class="w3layouts_breadcrumbs_right">
				<h3>Entrar / Cadastrar-se</h3>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- sign-in -->
	<div class="menu">
		<div class="container">	
			<div id="parentHorizontalTab">
				<ul class="resp-tabs-list hor_1">
					<li>Entrar</li>
					<li>Cadastrar-se</li>
				</ul>
				<div class="resp-tabs-container hor_1">
					<div class="login-top sign-top">
						<div class="agileits-login">
							<form action="login.php" method="post">
								<input type="email" class="email" name="email" placeholder="Email" required=""/>
								<input type="password" class="password" name="password" placeholder="Senha" required=""/>
								<div class="wthree-text"> 
									<!--<ul> 
										<li>
											<label class="anim">
												<input type="checkbox" class="checkbox">
												<span> Remember me ?</span> 
											</label> 
										</li>
										<li> <a href="#">Esqueceu a senha?</a> </li>
									</ul>-->
									<div class="clear"> </div>
								</div>  
								<div class="w3ls-submit">
									<div class="submit-text">
										<div id="status"></div>
										<input type="submit" value="Entrar" name="submit">
									</div>
									
								</div>
								
							</form>
						</div> 
					</div>
					<div class="login-top sign-top">
						<div class="agileits-login">
							<form action="index.php" method="post">
								<input type="text" name="nome" placeholder="Nome completo" required="">
								<input type="email" class="email" name="email" placeholder="Email" required=""/>
								<input type="password" class="password" name="senha" placeholder="Senha" required=""/>	
								<!--<label class="anim">
									<input type="checkbox" class="checkbox">
									<span>I accept the terms of use</span> 
								</label> -->
								<div class="w3ls-submit">
									<div class="submit-text">
										<input class="register" type="submit" value="Cadastrar">  
									</div>	
								</div>
							</form> 
						</div>  
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //sign-in -->
<!-- js -->
<script src="js/easyResponsiveTabs.js"></script>
	<script type="text/javascript">
    $(document).ready(function() {
        //Horizontal Tab
        $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>

<!-- //js -->
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="w3_agile_copyright">	
				<p>&copy; 2017 MamitApp | Design by <a href="http://w3layouts.com/">W3layouts</a>, coded by MarmitApp</p>
			</div>
		</div>
	</div>
<!-- //footer -->
</body>
</html>	