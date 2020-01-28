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
          $_SESSION["rol"] = $valor["rol"];
          header("location: index_socio.php"); }
          else{
            if($valor['rol']=="SECRETARIA"){
          $_SESSION["rol"] = $valor["rol"];
          header("location: index_secretaria.php"); }
          }
        }
        
        echo "Bienvenido ".$_SESSION["rol"];
        echo "<br>";
  }
  else
  {
    echo "Usuario y/o contraseña incorrecta...";
  }
}

?>
<?php
  //if (!empty($_SESSION['rol'])) {
  //function rol(){
    //echo "Bienvenido ".$_SESSION['rol'];}
    //}
    //else
    //{
     // echo "<script> alert('POR FAVOR INICIE SESSION'); </script>";
      //header("location: sistema_view.php");
    //}
    //
    //<script>  
      //alert('<?php rol(); ?>
  
  