<?php
require_once '../controlador/patientscontrolador.php';
$objpati=new patientscontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objpati->mostrar();
    elseif ($op=="nuevo")
        $objpati->nuevo();
    elseif ($op=="guardar")
        $objpati->guardar();
    elseif ($op=="editar")
        $objpati->editar();
    elseif($op=="update")
        $objpati->update();
        elseif($op=="insertar")
            $objpati->insertar();
        elseif($op=="recibir")
            $objpati->recibir();
            elseif($op=="eliminar")
                $objpati->eliminar();
?>
