<?php
	session_start();
	if(!empty($_SESSION["usuario"])){
	$usuario =  $_SESSION["usuario"];
	}else{
		header("location: sistema_view.php");
	}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>SIGEBUD</title>
	<link rel="stylesheet" type="text/css" href="css/estilosresponsive.css">
	<link rel="stylesheet" type="text/css" href="iconos/style.css">
	<meta charset="UTF-8">
<!--===============================================================================================-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

</head>				
<body>
	
	<header>
	<DIV Class="menu_bar">

		<a href="#" class="bt-menu"><span class="icon-list"></span> MENU</a>
	</DIV>
	<nav>
		<ul>
		 <li><a href="menu_socio.php">INICIO</a></li>
		 <li><a href="libro_view.php">BIBLIOTECA</a></li>
		 <li><a href="logout.php">CERRAR SESIÓN</a></li>	

		</ul>
	</nav>
	</header>
<?php
$cedula = $_SESSION['ced'];
	$conexion = pg_connect("host=localhost port=5432 dbname=proyectobiblioteca user=postgres password=1234");
	$busqueda = pg_query($conexion, "SELECT usuarios.cedula, usuarios.clave,socios.cedulasocio,socios.apellido,socios.nombre,socios.edad,socios.telefono, socios.cuidad from usuarios, socios where nombre ='".$usuario."' and cedula =  '".$cedula."' ;");
echo "<table border=2 class=table table-dark>
		<tr>
		<td colspan=7 align=center><b>Mis Datos</td>
		</tr>
		<tr>
		<td><b>Cedula</td>
		<td><b>Clave</td>
		<td><b>Nombre</td>
		<td><b>Apellido</td>
		<td><b>Edad</td>
		<td><b>Teléfono</td>
		<td><b>Cuidad</td>
		</tr>";
foreach(pg_fetch_all($busqueda) as $valor){
		echo "<tr>";
		echo "<td>".$valor['cedula']."</td>";
		echo "<td>".$valor['clave']."</td>";
		echo "<td>".$valor['nombre']."</td>";
		echo "<td>".$valor['apellido']."</td>";
		echo "<td>".$valor['edad']."</td>";
		echo "<td>".$valor['telefono']."</td>";
		echo "<td>".$valor['cuidad']."</td>";
		echo "</tr>";
		echo "<hr>";
$clave = $valor['clave'];

} echo "</table>";
$busq = pg_query($conexion,"select * from socios where cedulasocio='".$cedula."' ");
foreach(pg_fetch_all($busq) as $dato){
$edad = $dato['edad'];
$telefono = $dato['telefono'];
$cuidad = $dato['cuidad'];
}
echo"
		 <hr>
<form action=modificar.php method=post>
<h2>MODIFICAR CONTRASEÑA</h2><br>
<input type=text name=clave value='$clave' class=btn>
<input type=submit value=GUARDAR class=btn name='guardar'>
</form>
<hr><br>
";
echo"
<center>
<form action=modificar.php method=post>
<h2 align=center>MODIFICAR DATOS</h2><br>
<H3>
<table size=30 style='border-style:solid;border-width:1px;'>
<tr>
<td height=45 width=40>Edad: </td> <td><input type=text name=edad value='$edad'></td></tr>
<tr>
<td height=45 width=40>Teléfono: </td> <td><input type=text name=telefono value='$telefono'></td></tr>
<tr>
<td height=45 width=40>Cuidad:</td> <td><input type=text name=cuidad value='$cuidad'></td></tr>
</table></h3>
<br><br>
<input type=submit value=GUARDAR class=btn name='guardar2' size=15>
</form></fieldset></center>
<Br><br>
";


if(!empty($_POST['guardar2'])){
	$ne = $_POST['edad'];
	$nt= $_POST['telefono'];
	$ncd= $_POST['cuidad'];
	$conexion = pg_connect("host=localhost port=5432 dbname=proyectobiblioteca user=postgres password=1234");
	$query= pg_query($conexion,"UPDATE socios set edad='".$ne."', telefono = '".$nt."', cuidad = '".$ncd."' where cedulasocio =  '".$cedula."'  ");
	}

if(!empty($_POST['guardar'])){
	$nc = $_POST['clave'];
	$conexion = pg_connect("host=localhost port=5432 dbname=proyectobiblioteca user=postgres password=1234");
	$query= pg_query($conexion,"UPDATE usuarios set clave='".$nc."' where nombres ='".$usuario."' and cedula =  '".$cedula."'  ");
	echo "<script>
	alert('Contraseña cambiada exitosamente');
	</script>";
	} 
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