<!-- nav -->
	<div class="nav_comentario">
		<div class="overlay"></div>
		<div class="mobile-side-menu">
			<ul>
				<li class="active"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Cliente </a></li>
				<li><a href="#"><i class="fa fa-compass" aria-hidden="true"></i>Historico de pedidos</a></li>
				<li><a href="#"><i class="fa fa-picture-o" aria-hidden="true"></i>Configurações</a></li>
				<li class="active"><a href="/restaurante"><i class="fa fa-home" aria-hidden="true"></i>Restaurante </a></li>
				<?php
				    if(temRestaurante($_SESSION[id_usuario])){
				        
				?>
    				<li><a href="#"><i class="fa fa-compass" aria-hidden="true"></i>Pedidos</a></li>
    			<?php
				    }
    			?>
    			<li class="active"><a href="logout.php"><i class="fa fa-home fa fa-sign-in" aria-hidden="true"></i>Sair </a></li>
			</ul>
		</div>
		<div class="navbar">
			<div class="agile_container">
				<div class="w3_agile_nav_comentario_left">
					<div class="toggleMenu">
						<a href="#"> Menu </a>
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="/js/slide-from-top.js"></script> 
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