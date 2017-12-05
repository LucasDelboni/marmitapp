<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Cookhouse a Mobile App Flat Bootstrap Responsive Website Template | comentario :: W3layouts</title> 
<!-- For-Mobile-Apps-and-Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Cookhouse Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, SmartPhone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //For-Mobile-Apps-and-Meta-Tags -->
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all"> 
<link rel="stylesheet" href="css/jquery-ui.css" />
<link rel="stylesheet" href="css/smoothbox.css" type='text/css' media="all" />
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
include('valida_session.php');
$id_restaurante= $_GET[restaurante];


?>
</head>
<body class="bg">
	
	
	<?php 
		include("menu.php");
	?>
	
<!-- logo -->
	<div class="agileinfo_logo">
		<div class="agile_container">
			<h1><a href="#"><img src="images/logo.png" class="logo"/>MarmitAPP</a></h1>
		</div>
	</div>
<!-- //logo -->
<!-- banner -->
	<div class="banner">
		<div class="container">
			<div class="agileits_banner_left">
				<h2>we offer you the best meal</h2>
				<div class="w3ls_more">
					<a href="contact.html" class="btn btn-3 btn-3e icon-arrow-right">Mail Us</a>
				</div>
			</div>
			<div class="agileits_banner_right">
				<img src="images/2.png" alt=" " class="img-responsive" />
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //banner -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="w3layouts_breadcrumbs_left">
				<ul>
					<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>/</span></li>
					<li><i class="fa fa-cutlery" aria-hidden="true"></i>Reviews</li>
				</ul>
			</div>
			<div class="w3layouts_breadcrumbs_right">
				<h3>Menu</h3>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- banner-bottom -->
	<div class="banner-bottom">
		
		<script type="text/javascript">
			$(window).load(function() {
				$("#flexiselDemo1").flexisel({
					visibleItems: 4,
					animationSpeed: 1000,
					autoPlay: true,
					autoPlaySpeed: 3000,    		
					pauseOnHover: true,
					enableResponsiveBreakpoints: true,
					responsiveBreakpoints: { 
						portrait: { 
							changePoint:480,
							visibleItems: 2
						}, 
						landscape: { 
							changePoint:640,
							visibleItems:3
						},
						tablet: { 
							changePoint:768,
							visibleItems: 4
						}
					}
				});
				
			});
		</script>
		<script type="text/javascript" src="js/jquery.flexisel.js"></script>
	</div>
<!-- //banner-bottom -->
<!-- cuisine-names -->
	<div class="cuisine-names">
		<div class="container"> 
			<div>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Comentário</th>
							<th>Nota</th>
						</tr>
					</thead>
					<tbody>
						<?php
                            foreach (consultaComentariosRestaurante($id_restaurante) as $prato) {
                        ?>
                             <tr>
                                <td>
                                   <?php echo $prato[comentario]?>
                                </td>
                                <td>
                                    <?php echo $prato[nota]?>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
					</tbody>
				</table>				
			</div>
			
			<?php
				if (!empty($_POST[nota])) {
					echo "comentário adicionado";
					$comentario = $_POST[comentario];
					$nota=$_POST[nota];
					insereComentarioNota($_SESSION[id_usuario], $id_restaurante, $comentario, $nota);
				}

			?>
			<form method="POST" action=<?php echo "comentario.php?restaurante=$id_restaurante";?>>
				<h3 class="bars">O que você achou desse restaurante? </h3>
				<div class="input-group">
					<span class="input-group-addon" id="comentario">Comentário: </span>
					<input type="text" name="comentario" class="form-control" placeholder="Comentário" aria-describedby="comentario">
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="nota">Nota: </span>
					<input type="text" name="nota" class="form-control" placeholder="4.5" aria-describedby="nota">
				</div>
				
				<div class="row">
					<div class="input-group">
						<span class="input-group-btn">
							<button class="btn btn-default" name="submit" type="button submit">Enviar comentário!</button>
						</span>
					</div><!-- /input-group -->
				</div><!-- /.row -->
			</form>
		</div>
	</div>
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="w3_agile_copyright">	
				<p>&copy; 2016 Cookhouse. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
		</div>
	</div>
<!-- //footer -->
<!-- date -->									
	<script src="js/jquery-ui.js"></script>
	<script>
		  $(function() {
			$( "#datepicker" ).datepicker();
		  });
	</script>
<!-- //date -->
<!-- form-effect -->
	<script src="js/classie.js"></script>
	<script>
		(function() {
			// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
			if (!String.prototype.trim) {
				(function() {
					// Make sure we trim BOM and NBSP
					var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
					String.prototype.trim = function() {
						return this.replace(rtrim, '');
					};
				})();
			}

			[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
				// in case the input is already filled..
				if( inputEl.value.trim() !== '' ) {
					classie.add( inputEl.parentNode, 'input--filled' );
				}

				// events:
				inputEl.addEventListener( 'focus', onInputFocus );
				inputEl.addEventListener( 'blur', onInputBlur );
			} );

			function onInputFocus( ev ) {
				classie.add( ev.target.parentNode, 'input--filled' );
			}

			function onInputBlur( ev ) {
				if( ev.target.value.trim() === '' ) {
					classie.remove( ev.target.parentNode, 'input--filled' );
				}
			}
		})();
	</script>
<!-- //form-effect -->
</body>
</html>