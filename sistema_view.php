<?php
  session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Inicio Sesión</title>
	<link rel="stylesheet" type="text/css" href="css/estilosresponsive.css">
	<link rel="stylesheet" type="text/css" href="iconos/style.css">
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
<header>
	<DIV Class="menu_bar">

		<a href="#" class="bt-menu"><span class="icon-list"></span> MENU</a>
	</DIV>
	<nav>
		<ul>
		 <li><a href="index.html">INICIO</a></li>
		 <li><a href="about.html">INFORMACIÓN</a></li>
		 <li><a href="socios.html">SOCIOS</a></li>

		</ul>
	</nav>
	</header>

	<!-- BusquedaLibros -->
	<section class="section-reservation bg1-pattern p-t-100 p-b-113">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 p-b-30">
					<div class="t-center">
						<span class="tit2 t-center">
							SIGEBUD
						</span>

						<h3 class="tit3 t-center m-b-35 m-t-2">
							Ingreso al Sistema
						</h3>
					</div>

					<form class="wrap-form-reservation size22 m-l-r-auto" action="login.php" method="POST">
						<div class="row">

							<div class="col-md-6">
								<!-- Criterio -->
								<span class="txt9">
									Usuario
								</span>

								<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="usuario" placeholder="Usuario">
								</div>
							</div>

							<div class="col-md-6">
								<!-- Valor -->
								<span class="txt9">
									Contraseña
								</span>

								<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="contrasena" placeholder="Password">
								</div>
							</div>
						</div>

						<div class="wrap-btn-booking flex-c-m m-t-6">
							<!-- Button3 -->
							<button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
								Entrar
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="row">
				
			</div>
		</div>
	</section>

	<!-- Footer -->
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

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>

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



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/parallax100/parallax100.js"></script>
	<script type="text/javascript">
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/menu.js"></script>	

</body>
</html>