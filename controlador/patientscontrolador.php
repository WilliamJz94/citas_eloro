<?php
require_once '../modelo/modelopatients.php';
class patientscontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $patients=new Modelo();

        $dato=$patients->mostrar("patients", "1");
        require_once '../vista/patients/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/patients/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->idper=$_POST['cboano'];
                $alm->nomgra=$_POST['txtnomgra'];
                
                
     $this->model->insertar($alm);
     //-------------
header("Location: patients.php");

          }


    }
