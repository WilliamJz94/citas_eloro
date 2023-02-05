<?php
class Modelo{

  private $calendario;
  private $db;

  public function __construct(){
      $this->calendario=array();
      $this->db=new PDO('mysql:host=localhost;dbname=citas_hospital',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT calendario.idhora,calendario.nomhora, medico.coddoc, medico.dnidoc, medico.nomdoc, medico.apedoc, medico.telefo, calendario.estado, calendario.fere  FROM calendario INNER JOIN medico ON calendario.coddoc = medico.coddoc WHERE calendario.estado='1'";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->calendario[]=$tabla;
      }
      return $this->calendario;
    }
    public function  insertar(Modelo $data){
    try {
    $query="INSERT INTO calendario (nomhora,estado)VALUES(?,?)";

      $this->db->prepare($query)->execute(array($data->nomhora,$data->estado));

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
