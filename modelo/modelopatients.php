<?php
class Modelo{

  private $patients;
  private $db;

  public function __construct(){
      $this->patients=array();
      $this->db=new PDO('mysql:host=localhost;dbname=citas_hospital',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT * FROM customers WHERE estado='1'";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->patients[]=$tabla;
      }
      return $this->patients;
    }
    public function  insertar(Modelo $data){
    try {
    $query="INSERT INTO patients (dnipa, nombrep,apellidop)VALUES(?,?,?)";

      $this->db->prepare($query)->execute(array($data->dnipa, $data->nombrep, $data->apellidop));

    }catch (Exception $e) {

      die($e->getMessage());
    }
    }
	
  public function actualizar($tabla,$data,$condicion){
      $consulta="UPDATE $tabla SET $data WHERE $condicion";
      $resultado=$this->db->query($consulta);
      if($resultado){
          return true;
      }else{
          return false;
      }
  }
  public function eliminar($tabla,$condicion){
      $consulta="DELETE FROM $tabla WHERE $condicion";
      $resultado=$this->db->query($consulta);
      if($resultado){
          return true;
      }else{
          return false;
      }
  }
}

 ?>
