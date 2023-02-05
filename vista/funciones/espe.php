<?php

$conexion = mysqli_connect("localhost","root","","citas_hospital");

$query = $conexion->query("SELECT * FROM especialidades");

echo '<option value="0">Seleccione una especialidad</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['codespe']. '">' . $row['especialidad'] . '</option>' . "\n";
}
