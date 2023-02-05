<?php
require_once '../modelo/modelohorario.php';
class horariocontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $calendario=new Modelo();

        $dato=$calendario->mostrar("calendario", "1");
        require_once '../vista/horario/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/horario/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->nomhora=$_POST['txtnomhora'];
                $alm->estado=$_POST['cboestado'];
               
     $this->model->insertar($alm);
     //-------------
header("Location: horario.php");

          }


    }
