<?php

$conexion = mysqli_connect("localhost","root","","citas_hospital");

$query = $conexion->query("SELECT * FROM medico");

echo '<option value="0">Seleccione un doctor</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['coddoc']. '">' . $row['nomdoc'] . '' . $row['apedoc'] . '</option>' . "\n";
}
