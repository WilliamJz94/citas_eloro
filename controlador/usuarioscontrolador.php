<?php
require_once '../modelo/modelousuarios.php';
class usuarioscontrolador{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $usuarios=new Modelo();

        $dato=$usuarios->mostrar("usuarios", "1");
        require_once '../vista/usuarios/mostrar.php';
    }


    //INSERTAR
  public  function nuevo(){
        require_once '../vista/usuarios/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->nombre=$_POST['txtnombre'];
               
     $this->model->insertar($alm);
     //-------------
header("Location: usuarios.php");

          }


    }
