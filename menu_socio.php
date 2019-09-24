<?php
session_start();
	if(isset($_SESSION['usuario'])){
		echo "<script>
		alert('Bienvenido SOCIO ".$_SESSION['usuario']."');
		</script>";
	$usuario =  $_SESSION['usuario'];
	$cedula = $_SESSION['ced'];
	}else{
		header("location: sistema_view.php");
	}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>SIGEBUD</title>
	<link rel="stylesheet" type="text/css" href="css/estilosmenu.css">
	<link rel="stylesheet" type="text/css" href="iconos/style.css">
	<meta charset="UTF-8">
<!--===============================================================================================-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

</head>					<!-- Menu -->
<body>
	<header>
	<DIV Class="menu_bar">
		<a href="#" class="bt-menu""><span class="icon-list"></span><b style="visibility:hidden;">.</b></a>
	</DIV>
	<nav>
		<ul>
		 <li><a href="menu_socio.php">INICIO</a></li>
		 <li><a href="libros.php">MIS LIBROS</a></li>
		 <li><a href="libro_view.php">BIBLIOTECA</a></li>
		 <li><a href="modificar.php">MODIFICAR MI INFORMACIÓN</a></li>
		 <li><a href="logout.php">CERRAR SESIÓN</a></li>	
		</ul>
	</nav>
	</header>

<?php
	echo "
	<section class=bg2-pattern p-t-116 p-b-110 t-center p-l-15 p-r-15>
	<h3 class=tit3 t-center m-b-35 m-t-5 align=center>Bienvenido ".$usuario."</h1>
	</section>
	<center><img src='images/socio.png' width=250></center>
	<br>";
?>
	

	<footer class="bg1">
		<div class="container p-t-20 p-b-20">
			<div class="row">
				<div class="col-sm-6 col-md-4 p-t-20">
					<!-- - -->
					<h4 class="txt13 m-b-33">
						Contactos
					</h4>

					<ul class="m-b-70">
						<li class="txt14 m-b-14">
							<i class="fa fa-map-marker fs-16 dis-inline-block size19" aria-hidden="true"></i>
							Sucre e Independencia - Esquina, Pasaje - El Oro
						</li>

						<li class="txt14 m-b-14">
							<i class="fa fa-phone fs-16 dis-inline-block size19" aria-hidden="true"></i>
							(+593) 72 914 165 
						</li>

						<li class="txt14 m-b-14">
							<i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>
							contactos@unionydisciplina.com
						</li>
					</ul>

				</div>

				<div class="col-sm-6 col-md-4 p-t-20">
					<!-- - -->
					<h4 class="txt13 m-b-32">
						Horario de Atención
					</h4>

					<ul>
						<li class="txt14 m-b-14">
							08:30 AM – 12:20 PM y de 14:30 PM – 18:00 PM
						</li>

						<li class="txt14 m-b-14">
							Lunes - Viernes
						</li>
					</ul>

				</div>
			</div>
		</div>

		<div class="end-footer bg2">
			<div class="container">
				<div class="flex-sb-m flex-w p-t-22 p-b-22">
					<div class="p-t-5 p-b-5">
						<a href="https://www.facebook.com/unionydisciplinaPasaje" class="fs-15 c-white" target="_blank"><i class="fa fa-facebook m-l-18" aria-hidden="true"></i></a>
						<a href="https://twitter.com/UnionyDisciplinaPasaje" class="fs-15 c-white" target="_blank"><i class="fa fa-twitter m-l-18" aria-hidden="true"></i></a>
					</div>

					<div class="txt17 p-r-20 p-t-5 p-b-5">
						Copyright &copy; 2018 Todos los derechos reservados | Desarrollado por Quinto Análisis de Sistemas "A"<br>
						<a href="\SIGEBUD\documentos\politica_privacidad.pdf" download="Politicas de Privacidad">Politicas de Privacidad</a>
						<label>  </label>
						<a href="\SIGEBUD\documentos\terminos_condiciones.pdf" download="Terminos y Condiciones">Términos y Condiciones de uso</a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Modal Video 01-->
	<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

		<div class="modal-dialog" role="document" data-dismiss="modal">
			<div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

			<div class="wrap-video-mo-01">
				<div class="w-full wrap-pic-w op-0-0"><img src="images/icons/video-16-9.jpg" alt="IMG"></div>
				<div class="video-mo-01">
					<iframe src="https://www.youtube.com/embed/5k1hSu2gdKE?rel=0&amp;showinfo=0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
</script>
<script src="js/main.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/menu.js"></script>
</body>
</html>
