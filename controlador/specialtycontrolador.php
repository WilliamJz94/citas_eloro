<?php
require_once '../modelo/modelospecialty.php';
class specialtycontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $especialidades=new Modelo();

        $dato=$especialidades->mostrar("especialidades", "1");
        require_once '../vista/especialidades/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/especialidades/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->especialidad=$_POST['txtespecialidad'];
                $alm->descripcion=$_POST['txtdescripcion'];
               
     $this->model->insertar($alm);
     //-------------
header("Location: especialidad.php");

          }


    }
