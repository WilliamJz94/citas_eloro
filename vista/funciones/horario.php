<?php

$conexion = mysqli_connect("localhost","root","","citas_hospital");

$query = $conexion->query("SELECT * FROM calendario");

echo '<option value="0">Seleccione un horario</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['idhora']. '">' . $row['nomhora'] . '</option>' . "\n";
}
