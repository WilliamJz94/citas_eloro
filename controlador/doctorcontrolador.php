<?php
require_once '../modelo/modelodoctor.php';
class doctorcontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $medico=new Modelo();

        $dato=$medico->mostrar("medico", "1");
        require_once '../vista/doctor/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/doctor/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->dnidoc=$_POST['txtdnidoc'];
                $alm->nomdoc=$_POST['txtnomdoc'];
                
                
                
     $this->model->insertar($alm);
     //-------------
header("Location: doctor.php");

          }


    }
