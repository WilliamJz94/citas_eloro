
<?php
//Incluimos el fichero de conexion
Class dbConexion{
/* Variables de conexion */
var $dbhost = "localhost";
var $username = "root";
var $password = "";
var $dbname = "citas_hospital";
var $conn;
//Funcion de conexion MySQL
function getConexion() {
$con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());

/* Revisamos la conexion */
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
} else {
$this->conn = $con;
}
return $this->conn;
}
}
//Incluimos la libreria PDF
include_once('../../assets/fpdf/fpdf.php');

class PDF extends FPDF
{
// Funcion encargado de realizar el encabezado
function Header()
{
// Logo

$this->SetFont('Arial','B',13);
// Move to the right
$this->Cell(80);
// Title
$this->Cell(95,10,'Lista de doctores',1,0,'C');
// Line break
$this->Ln(20);
}
// Funcion pie de pagina
function Footer()
{
// Position at 1.5 cm from bottom
$this->SetY(-15);
// Arial italic 8
$this->SetFont('Arial','I',8);
// Page number
$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$db = new dbConexion();
$connString = $db->getConexion();
$display_heading = array('coddoc'=>'#', 'dnidoc'=> 'Cédula', 'nomdoc'=> 'Nombres','apedoc'=> 'Apellido','Especialidad'=> 'Especialidad','sexo'=> 'Sexo','telefo'=> 'Telefono','fechanaci'=> 'Nacimiento','correo'=> 'Correo','naciona'=> 'Nacionalidad');

$result = mysqli_query($connString, "SELECT medico.coddoc, medico.dnidoc, medico.nomdoc, medico.apedoc, especialidades.codespe, especialidades.especialidad, medico.sexo, medico.telefo, medico.fechanaci, medico.correo, medico.estado, medico.fecha_create FROM medico INNER JOIN especialidades ON medico.codespe = especialidades.codespe") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM doctor");

$pdf = new PDF('L','mm','A4');
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12, 'UTF-8');
// Declaramos el ancho de las columnas
$w = array(10, 25,36,36,40,28,26,53,30);
//Declaramos el encabezado de la tabla
$pdf->Cell(10,12,'#',1);
$pdf->Cell(25,12,'CEDULA',1);
$pdf->Cell(36,12,'NOMBRES',1);
$pdf->Cell(36,12,'APELLIDOS',1);
$pdf->Cell(40,12,'ESPECIALIDAD',1);
$pdf->Cell(28,12,'TELEFONO',1);
$pdf->Cell(26,12,'SEXO',1);
$pdf->Cell(53,12,'CORREO',1);
$pdf->Cell(30,12,'NACIMIENTO',1);

$pdf->Ln();
$pdf->SetFont('Arial','',12, 'UTF-8');
//Mostramos el contenido de la tabla
foreach($result as $row)
{
$pdf->Cell($w[0],6,$row['coddoc'],1);
$pdf->Cell($w[1],6,utf8_decode($row['dnidoc']),1);
$pdf->Cell($w[2],6,utf8_decode($row['nomdoc']),1);
$pdf->Cell($w[3],6,utf8_decode($row['apedoc']),1);
$pdf->Cell($w[4],6,utf8_decode($row['especialidad']),1);
$pdf->Cell($w[5],6,utf8_decode($row['telefo']),1);
$pdf->Cell($w[6],6,utf8_decode($row['sexo']),1);
$pdf->Cell($w[7],6,utf8_decode($row['correo']),1);

$pdf->Cell($w[8],6,$row['fechanaci'],1);

$pdf->Ln();
}
$pdf->Output('doctor.pdf', 'D');
?>