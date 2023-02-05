<?php
session_start();
Class Connection{
	private $server= "mysql:host=localhost;dbname=citas_hospital";
	private $username ="root";
	private $password ="";
	private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $conn;

	public function open(){
		try{
			$this->conn = new PDO($this->server,$this->username,$this->password,$this->options);
				return $this->conn;
		}
		catch (PDOException $e){
			echo "Hubo un problema con la conexion: ".$e->getMessage();
		}
	}
	public function close(){
		$this->conn = null;
	}
}
if(isset($_GET['id'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$sql = "UPDATE citas SET estado='0' WHERE codcit= ".$_GET['id'].""; //if-else statement in executing our query
		$_SESSION['message']=($db->exec($sql))?'Borrado': 'Hubo un error al borrar';
	}
	catch(PDOException $e){
		$_SESSION['message']= $e->getMessage();
	}

	//Cerrar conexion
	$database->close();
}
else{
	$_SESSION['message']='Seleccionar miembro para eliminar primero';
}

header("location: ../../folder/appointment.php");

?>
