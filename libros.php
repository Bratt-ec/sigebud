<?php
session_start();
error_reporting(E_ALL ^ E_WARNING);
if(!empty($_SESSION["usuario"])){
	$usuario =  $_SESSION["usuario"];
	$cedula = $_SESSION['ced'];
	}else{
		header("location: sistema_view.php");
	}
	?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>LIBROS</title>
	<link rel="stylesheet" type="text/css" href="css/estilosresponsive.css">
	<link rel="stylesheet" type="text/css" href="iconos/style.css">
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body class="animsition">
	
<header>
	<DIV Class="menu_bar">

		<a href="#" class="bt-menu"><span class="icon-list"></span> MENU</a>
	</DIV>
	<nav>
		<ul>
		<li><a href="menu_socio.php">INICIO</a></li>
		 <li><a href="modificar.php">MODIFICAR MI INFORMACIÓN</a></li>
		 <li><a href="logout.php">CERRAR SESIÓN</a></li>	
		</ul>
	</nav>
	</header>
<h1 align="center">MIS LIBROS<img src='images/libro.png' width=75></h1>
<?php
$conexion = pg_connect("host=localhost port=5432 dbname=proyectobiblioteca user=postgres password=1234");
$cdls = pg_query($conexion,"SELECT * from socios where cedulasocio =  '".$cedula."'");
        foreach (pg_fetch_all($cdls) as $valor) 
        {
          $codls=$valor['codigo_socio'];
        }
$cod_soc = $codls;
$tabla = pg_query($conexion,"SELECT * FROM librosseleccionados where codigo_sc ='".$cod_soc."'");
echo "<table class='table'>";
$numReg = pg_num_rows($tabla);
if($numReg >= 1){
	$libros=pg_query($conexion,"SELECT nombrel,autorl,editorial_l,tomol,edicionl FROM librosseleccionados where codigo_sc ='".$cod_soc."'");
echo"
<tr>
							      <td><b>Nombre</b></td>
							      <td><b>Autor</b></td>
							      <td><b>Editorial</b></td>
							      <td><b>Tomo</b></td>
							      <td><b>Edición</b> </td>							    
							    </tr>";
foreach (pg_fetch_all($libros) as $valor){
	echo"<tr>";
	foreach($valor as $imp){
			echo "<td>".$imp."</td>";
	}
	echo "</tr>";
}

}else{
	echo "<h1><b><i>USTED NO TIENE LIBROS ADQUIRIDOS</h1></b></i>";
} echo "</table>";
	$connec = pg_query($conexion,"SELECT * from socios where cedulasocio =  '".$cedula."'");
        foreach (pg_fetch_all($connec) as $valor) 
        {
        echo"<form action=reportes.php method=post>";
		$nombre= $valor['nombre'];
		$apellido = $valor['apellido'];
		$cuidad = $valor['cuidad'];
		$telefono = $valor['telefono'];
		echo "<center>
        <input type=text name=valor style='visibility:hidden;display:none;' value='$cedula'>
        <input type=text name=nombre style='visibility:hidden;display:none;' value='$nombre'>
        <input type=text name=apellido style='visibility:hidden;display:none;' value='$apellido'>
        <input type=text name=cuidad style='visibility:hidden;display:none;' value='$cuidad'>
        <input type=text name=telefono style='visibility:hidden;display:none;' value='$telefono'>
		<input type=submit name=imprimir value=IMPRIMIR COMPROBANTE class='btn btn-success'>
        </center></form>
        ";}
?>
<br><br>
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
	</footer>|

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



	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>	
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
	<script type="text/javascript" src="vendor/parallax100/parallax100.js"></script>
	<script type="text/javascript">
        $('.parallax100').parallax100();
	</script>
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/menu.js"></script>

</body>
</html>