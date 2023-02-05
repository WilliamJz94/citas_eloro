<?php
class Modelo{

  private $medico;
  private $db;

  public function __construct(){
      $this->medico=array();
      $this->db=new PDO('mysql:host=localhost;dbname=citas_hospital',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT medico.coddoc, medico.dnidoc, medico.nomdoc, medico.apedoc, especialidades.codespe, especialidades.especialidad ,medico.sexo, medico.telefo, medico.ciudad, medico.fechanaci, medico.correo, medico.estado, medico.fecha_create FROM medico INNER JOIN especialidades ON medico.codespe = especialidades.codespe WHERE medico.estado='1'";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->medico[]=$tabla;
      }
      return $this->medico;
    }
    public function  insertar(Modelo $data){
    try {
    $query="INSERT INTO medico (dnidoc, nomdoc,apedoc)VALUES(?,?,?)";

      $this->db->prepare($query)->execute(array($data->dnidoc, $data->nomdoc, $data->apedoc));

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
