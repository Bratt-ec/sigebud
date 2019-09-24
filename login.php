<?php
session_start();
$conn= pg_connect("host=localhost port=5432 dbname=proyectobiblioteca user=postgres password=1234");
if(isset($_POST["usuario"]))
{
  $usuario = $_POST["usuario"];
  $contrasena = $_POST["contrasena"];

  $result = pg_query($conn, "SELECT * FROM  usuarios WHERE cedula = '".$usuario."' AND clave = '".$contrasena."'");
  if (pg_fetch_all($result)) {  
        foreach (pg_fetch_all($result) as $valor) 
        {
          if($valor['rol']=="SOCIO"){
          $nombre = $valor['nombres'];
          $_SESSION['ced'] = $usuario;
          $_SESSION['usuario']=$nombre;
          header("location: menu_socio.php"); }
        }
  }
  else
  {
    header("location: sistema_view.php");
  }
}
?>
  