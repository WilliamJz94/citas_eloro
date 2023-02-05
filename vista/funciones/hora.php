<?php

$conexion = mysqli_connect("localhost","root","","citas_hospital");

$pais = $_POST['paises'];

$query = $conexion->query("SELECT * FROM calendario WHERE coddoc = $pais");



while ( $row = $query->fetch_assoc() )
{

	echo '<option value="' . $row['idhora']. '">' . $row['nomhora'] . '</option>' . "\n";
}
