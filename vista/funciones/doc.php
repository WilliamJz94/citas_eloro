<?php

$conexion = mysqli_connect("localhost","root","","citas_hospital");

$el_continente = $_POST['continente'];

$query = $conexion->query("SELECT * FROM medico WHERE codespe = $el_continente");

echo '<option value="0">Seleccione un médico</option>';

while ( $row = $query->fetch_assoc() )
{


	echo '<option value="' . $row['coddoc']. '">' . $row['nomdoc'] . '' . $row['apedoc'] . '</option>' . "\n";
}
