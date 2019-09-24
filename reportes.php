<?php
require('FPDF/fpdf.php');
$ced = $_POST['valor'];
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('images/logo.jpg',10,8,20);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Título
    $this->Cell(0,0,utf8_decode('ASOCIACION DE OBREROS UNIÓN Y DISCIPLINA'),0,0,'C');
    $this->Image('images/logo2.jpg',180,8,20);
    $this->Ln(7);
    $this->Cell(0,0,utf8_decode('Sistema de gestión de biblioteca'),0,0,'C');
    $this->Ln(7);
    $this->Cell(0,0,utf8_decode('MI LISTA DE LIBROS'),0,0,'C');
    // Salto de línea
    $this->Ln(15);
}
// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$nombre= $_POST['nombre'];
$apellido = $_POST['apellido'];
$cuidad = $_POST['cuidad'];
$telefono = $_POST['telefono'];
$conexion= pg_connect("host=localhost port=5432 dbname=proyectobiblioteca user=postgres password=1234 ");
$connec = pg_query($conexion,"SELECT * from socios where cedulasocio =  '".$ced."'");
        foreach (pg_fetch_all($connec) as $valor) 
        {
          $codigo=$valor['codigo_socio'];
        }
$codigosoc = $codigo;
$tabla = pg_query($conexion,"SELECT nombrel,autorl,editorial_l,tomol,edicionl FROM librosseleccionados where codigo_sc ='".$codigosoc."'");
//$query = pg_query($conexion,"select * from LIBROS");
$pdf->SetFont('Arial','B',12);
$pdf -> Setx(-350);
$pdf->Cell(0,0,'Nombre: '.$nombre,0,0,'C',0);
$pdf -> ln(7);
$pdf -> Setx(-349);
$pdf->Cell(0,0,'Apellido: '.$apellido,0,0,'C',0);
$pdf ->Ln(7);
$pdf -> Setx(-351);
$pdf->Cell(0,0,'Cuidad: '.$cuidad,0,0,'C',0);
$pdf ->Ln(7);
$pdf -> Setx(-342);
$pdf->Cell(0,0,'Cedula: '.$ced,0,0,'C',0);
$pdf ->Ln(7);
$pdf -> Setx(-340);
$pdf->Cell(0,0,'Telefono: '.$telefono,0,0,'C',0);
$pdf ->Ln(20);
$pdf -> Setx(-187);
$pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(49,6,'Nombre Libro',1,0,'C',1);
    $pdf->Cell(40,6,'Autor',1,0,'C',1);
    $pdf->Cell(40,6,'Editorial',1,0,'C',1);
    $pdf->Cell(15,6,'Tomo',1,0,'C',1);
    $pdf->Cell(20,6,'Edicion',1,1,'C',1);
    
    $pdf->SetFont('Arial','',11);
    
    while($row = pg_fetch_assoc($tabla))
    {
        $pdf -> Setx(-187); //nombrel,autorl,editorial_l,tomol,edicionl
        $pdf->Cell(49,6,utf8_decode($row['nombrel']),1,0,'C');
        $pdf->Cell(40,6,utf8_decode($row['autorl']),1,0,'C');
        $pdf->Cell(40,6,utf8_decode($row['editorial_l']),1,0,'C');
        $pdf->Cell(15,6,$row['tomol'],1,0,'C');
        $pdf->Cell(20,6,$row['edicionl'],1,1,'C');
    }
    $pdf->Output();
?>