<?php
class Modelo{

  private $citas;
  private $db;

  public function __construct(){
      $this->citas=array();
      $this->db=new PDO('mysql:host=localhost;dbname=citas_hospital',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT citas.codcit, citas.asunto,customers.codpaci, customers.dnipa, customers.nombrep, customers.apellidop, medico.coddoc, medico.dnidoc, medico.apedoc,medico.nomdoc, especialidades.codespe, especialidades.especialidad, citas.start, citas.end, citas.estado, citas.fecha_create FROM citas INNER JOIN customers ON citas.codpaci = customers.codpaci INNER JOIN medico ON citas.coddoc = medico.coddoc INNER JOIN especialidades ON citas.codespe = especialidades.codespe WHERE citas.estado='1'";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->citas[]=$tabla;
      }
      return $this->citas;
    }
    public function  insertar(Modelo $data){
    try {
    $query="INSERT INTO citas (asunto)VALUES(?)";

      $this->db->prepare($query)->execute(array($data->asunto));

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
