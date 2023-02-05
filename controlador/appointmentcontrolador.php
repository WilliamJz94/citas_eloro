<?php
require_once '../modelo/modeloappointment.php';
class appointmentcontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $citas=new Modelo();

        $dato=$citas->mostrar("citas", "1");
        require_once '../vista/appointment/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/appointment/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->asunto=$_POST['txtasunto'];
               
     $this->model->insertar($alm);
     //-------------
header("Location: appointment.php");

          }


    }
