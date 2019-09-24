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
<?php
$cedula = $_SESSION['ced'];
	echo "
	<section class=bg2-pattern p-t-116 p-b-110 t-center p-l-15 p-r-15>
	<h3 class=tit3 t-center m-b-35 m-t-5 align=center> PRÉSTAMO DE LIBROS</h1>
	</section>";
$conexion = pg_connect("host=localhost port=5432 dbname=proyectobiblioteca user=postgres password=1234");
$busqueda = pg_query($conexion, "SELECT usuarios.cedula,socios.cedulasocio,socios.apellido,socios.nombre,socios.edad,socios.telefono, socios.cuidad from usuarios, socios where nombre ='".$usuario."' and cedula =  '".$cedula."' ;");
echo "<table border=2 class=table table-dark>
		<tr>
		<td colspan=6 align=center><b>Mis Datos</td>
		</tr>
		<tr>
		<td><b>Cedula</td>
		<td><b>Nombre</td>
		<td><b>Apellido</td>
		<td><b>Edad</td>
		<td><b>Teléfono</td>
		<td><b>Cuidad</td>
		</tr>";
foreach(pg_fetch_all($busqueda) as $valor){
		echo "<tr>";
		echo "<td>".$valor['cedula']."</td>";
		echo "<td>".$valor['nombre']."</td>";
		echo "<td>".$valor['apellido']."</td>";
		echo "<td>".$valor['edad']."</td>";
		echo "<td>".$valor['telefono']."</td>";
		echo "<td>".$valor['cuidad']."</td>";
		echo "</tr>";
		echo "<hr>";
	}
echo "</table>";

?>
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
							Busqueda de libros
						</h3>
					</div>

					<form class="wrap-form-reservation size22 m-l-r-auto" action="libro_view.php" method="POST">
						<div class="row">

							<div class="col-md-6">
								<!-- Criterio -->
								<span class="txt9">
									Criterio
								</span>

								<div class="wrap-inputtime size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<!-- Select1 -->
									<select class="selection-1" name="criterio">
										<option value="Nombre">Nombre</option>
										<option value="Autor">Autor</option>
										<option value="Editorial">Editorial</option>
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<!-- Valor -->
								<span class="txt9">
									Valor
								</span>

								<div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
									<input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="valor" placeholder="Dato a buscar">
								</div>
							</div>
						</div>

						<div class="wrap-btn-booking flex-c-m m-t-6">
							<!-- Button3 -->
							<button type="submit" class="btn3 flex-c-m size13 txt11 trans-0-4">
								Consultar
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="row">
				<?php

					$conn= pg_connect("host=localhost port=5432 dbname=proyectobiblioteca user=postgres password=1234");

					if(isset($_POST["valor"]))
					{
						$valor = $_POST["valor"];
						$criterio = $_POST["criterio"];

						if($criterio == "Nombre"){
							$result= pg_query($conn, "SELECT * FROM  libros WHERE nombreLibro LIKE '".$valor."%'");	
						}elseif ($criterio == "Autor") {
							$result= pg_query($conn, "SELECT * FROM  libros WHERE autor LIKE '".$valor."%'");	
						}else{
							$result= pg_query($conn, "SELECT * FROM  libros WHERE editorial LIKE '".$valor."%'");	
						}
					}
					else
					{
						$result= pg_query($conn, "SELECT * FROM  libros");
					}

					if (pg_fetch_all($result)) {
						echo "<table class='table'>";
						echo "<thead class='thead-dark'>
							    <tr>
							      <th scope='col'>#</th>
							      <th scope='col'>Nombre</th>
							      <th scope='col'>Autor</th>
							      <th scope='col'>Editorial</th>
							      <th scope='col'>Tomo</th>
							      <th scope='col'>Edición</th>
							      <th scope='col'>Acción</th>
							    </tr>
							  </thead>";
						foreach (pg_fetch_all($result) as $valor) 
						{
							echo "<form action=libro_view.php method=post>";
							echo "<tr>";
							echo "<td>".$valor['codigo_libro']."</td>"; $cl=$valor['codigo_libro'];
							echo "<td>".$valor['nombrelibro']."</td>";$nl=$valor['nombrelibro'];
							echo "<td>".$valor['autor']."</td>";$at=$valor['autor'];
							echo "<td>".$valor['editorial']."</td>";$edt= $valor['editorial'];
							echo "<td>".$valor['tomo']."</td>";$tm=$valor['tomo'];
							echo "<td>".$valor['edicion']."</td>";$ed=$valor['edicion'];
							echo "<td>
							<input type=text name=nombre style='visibility:hidden;display:none;' value='$nl'>
							<input type=text name=autor style='visibility:hidden;display:none;' value='$at'>
							<input type=text name=editorial style='visibility:hidden;display:none;' value='$edt'>
							<input type=text name=tomo style='visibility:hidden;display:none;' value='$tm'>
							<input type=text name=edicion style='visibility:hidden;display:none;' value='$ed'> 
							<input type=submit class='btn btn-success' value=Añadir name=agregar> </form>
							</td>";
							echo "</tr>";
						}
if(!empty($_POST['agregar'])){
	$cdls = pg_query($conexion,"SELECT * from socios where cedulasocio =  '".$cedula."'");
        foreach (pg_fetch_all($cdls) as $valor) 
        {
          $codls=$valor['codigo_socio'];
        }
$cod_soc = $codls;
$tabla = pg_query($conexion,"SELECT * FROM gestionprestamo where codigosocio ='".$cod_soc."'");
echo "<table class='table'>";
$numReg = pg_num_rows($tabla);
//echo $numReg;
if($numReg >= 1){
echo "<script>
		alert('Usted ya tiene libros adquiridos,para poder hacer otro PRÉSTAMO devuelva los libros que tiene actualmentes');
		</script>";

}else{

$nl= $_POST['nombre'];
$at= $_POST['autor'];
$edt =$_POST['editorial'];
$tm = $_POST['tomo'];
$ed =$_POST['edicion'];
$conex = pg_connect("host=localhost port=5432 dbname=proyectobiblioteca user=postgres password=1234");
$add = pg_query($conex,"INSERT INTO librosseleccionados(nombrel,autorl,editorial_l,tomol,edicionl,codigo_sc) VALUES('".$nl."','".$at."','".$edt."','".$tm."','".$ed."','".$cod_soc."')");

}	}
						echo "</table>";
					}
					else
					{
						echo "<h3>No hay datos para la busqueda</h3>";
					}

echo "
	<section class=bg2-pattern p-t-116 p-b-110 t-center p-l-15 p-r-15>
	<h4 class=tit3 t-center m-b-35 m-t-5 align=center> Mis Libros<img src='images/libro.png' width=75></h4>
	</section>";
	echo "<br><br>";
$connec = pg_query($conexion,"SELECT * from socios where cedulasocio =  '".$cedula."'");
        foreach (pg_fetch_all($connec) as $valor) 
        {
          $codigo=$valor['codigo_socio'];
        }
$codigosoc = $codigo;
$tabla = pg_query($conexion,"SELECT nombrel,autorl,editorial_l,tomol,edicionl FROM librosseleccionados where codigo_sc ='".$codigosoc."'"); 
echo "<table class='table'>";
$numReg = pg_num_rows($tabla);
if($numReg>0){
foreach (pg_fetch_all($tabla) as $valor){
	echo"<tr>";

	foreach($valor as $imp){
			echo "<td>".$imp."</td>";
	}
	echo "</tr>";
} }else{
	echo "<h4>NO HAY LIBROS SELECCIONADOS";

}
echo "</table>";
?>
<form action=libro_view.php method="post">
<input type="submit" name="prestamo" value="Hacer Prestamo" class="btn btn-success">
</form>
<label style='visibility:hidden;'>AA</label>
	<?php 
	$connec = pg_query($conexion,"SELECT * from socios where cedulasocio =  '".$cedula."'");
        foreach (pg_fetch_all($connec) as $valor) 
        {
        echo"<form action=reportes.php method=post>";
		$nombre= $valor['nombre'];
		$apellido = $valor['apellido'];
		$cuidad = $valor['cuidad'];
		$telefono = $valor['telefono'];
		echo "
        <input type=text name=valor style='visibility:hidden;display:none;' value='$cedula'>
        <input type=text name=nombre style='visibility:hidden;display:none;' value='$nombre'>
        <input type=text name=apellido style='visibility:hidden;display:none;' value='$apellido'>
        <input type=text name=cuidad style='visibility:hidden;display:none;' value='$cuidad'>
        <input type=text name=telefono style='visibility:hidden;display:none;' value='$telefono'>
		<input type=submit name=imprimir value=IMPRIMIR COMPROBANTE class='btn btn-success' style=''>
        </form>
        ";}
	 ?>

<br>
<?php

if(!empty($_POST['prestamo'])){
//$ls = pg_query($conexion,"SELECT * FROM librosseleccionados");
$cs = pg_query($conexion,"SELECT * from socios where cedulasocio =  '".$cedula."'");
        foreach (pg_fetch_all($cs) as $valor) 
        {
          $cod=$valor['codigo_socio'];
        }
$cod_s = $cod;
$fecha= date("d-m-Y");
$ob="prestamo en la pagina web";
$cp = pg_query($conexion,"SELECT codigo_prestamo from gestionprestamo ORDER BY codigo_prestamo DESC LIMIT 1;");
        foreach (pg_fetch_all($cp) as $valor) 
        {
          $cpr=$valor['codigo_prestamo'];
        }
$codigo_p = $cpr + 1;
//ENCABEZADO DE PRESTAMO
$guardar=pg_query($conexion,"insert into gestionprestamo(codigo_prestamo,fechaprestamo,codigosocio,observaciones) values('".$codigo_p."','".$fecha."','".$cod_s."','".$ob."')");
echo "<script>
		alert('Prestamo Guardado');
		</script>";
//DETALLE DE PRESTAMO codlibroprestado,codigo_libro,codigo_prestamo
$ls = pg_query($conexion,"SELECT codigo_l FROM librosseleccionados");
while ($reg=pg_fetch_array($ls))
{
$cl=$reg['codigo_l'];
$cp = pg_query($conexion,"SELECT codigo_prestamo from gestionprestamo ORDER BY codigo_prestamo DESC LIMIT 1;");
        foreach (pg_fetch_all($cp) as $valor) 
        {
          $codp=$valor['codigo_prestamo'];
        }
$cod_p = $codp;
try{
	$sql = new PDO("pgsql: host = localhost; port = 5432; dbname= proyectobiblioteca; user=postgres; password=1234");
		$smt = $sql -> prepare("insert into librosprestados(codigo_libro,codigo_prestamo) values(:codigo_libro,:codigo_prestamo)");
		$smt -> bindParam(":codigo_libro",$cl);
		$smt -> bindParam(":codigo_prestamo",$cod_p);
		$smt -> execute();

} catch(PDOExeption $e){
	echo "Fallo en la conexion: ". $e -> getMessage(); 
} 
try {
	$smt = $sql -> prepare("select * from librosprestados");
	$smt -> execute();
	$result = $smt -> fetchAll(PDO::FETCH_ASSOC);
} catch(PDOExeption $e){
	echo "Fallo en la conexion: ". $e -> getMessage(); 
}	}
//
	 }

?>
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