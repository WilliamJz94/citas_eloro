
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
$this->Cell(95,10,'Lista de citas',1,0,'C');
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
$display_heading = array('codcit'=>'#', 'asunto'=> 'Asunto', 'nombrep'=> 'Paciente','nombrees'=> 'Especialidad','nomdoc'=> 'Doctor','start'=> 'Inicio','end'=> 'Fin');

$result = mysqli_query($connString, "SELECT codcit, citas.asunto, customers.codpaci, customers.dnipa, customers.nombrep, customers.apellidop,medico.coddoc, medico.dnidoc,medico.nomdoc, medico.apedoc,calendario.idhora, calendario.nomhora,especialidades.codespe, especialidades.especialidad, citas.estado,start, end, color  FROM citas INNER JOIN customers ON citas.codpaci = customers.codpaci INNER JOIN medico ON citas.coddoc = medico.coddoc INNER JOIN especialidades ON citas.codespe = especialidades.codespe INNER JOIN calendario ON citas.idhora =  calendario.idhora") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM citas");

$pdf = new PDF('L','mm','A4');
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12, 'UTF-8');
// Declaramos el ancho de las columnas
$w = array(10, 70,30,50,40,45,41);
//Declaramos el encabezado de la tabla
$pdf->Cell(10,12,'#',1);
$pdf->Cell(70,12,'ASUNTO',1);
$pdf->Cell(30,12,'PACIENTE',1);
$pdf->Cell(50,12,'ESPECIALIDAD',1);
$pdf->Cell(40,12,'DOCTOR',1);
$pdf->Cell(45,12,'INICIO',1);
$pdf->Cell(41,12,'FIN',1);


$pdf->Ln();
$pdf->SetFont('Arial','',12, 'UTF-8');
//Mostramos el contenido de la tabla
foreach($result as $row)
{
$pdf->Cell($w[0],6,$row['codcit'],1);
$pdf->Cell($w[1],6,utf8_decode($row['asunto']),1);
$pdf->Cell($w[2],6,utf8_decode($row['nombrep']),1);
$pdf->Cell($w[3],6,utf8_decode($row['especialidad']),1);
$pdf->Cell($w[4],6,utf8_decode($row['nomdoc']),1);
$pdf->Cell($w[5],6,utf8_decode($row['start']),1);
$pdf->Cell($w[6],6,utf8_decode($row['end']),1);


$pdf->Ln();
}
$pdf->Output('citas.pdf', 'D');
?>