<?php
require_once '../controlador/doctorcontrolador.php';
$objdocto=new doctorcontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objdocto->mostrar();
    elseif ($op=="nuevo")
        $objdocto->nuevo();
    elseif ($op=="guardar")
        $objdocto->guardar();
    elseif ($op=="editar")
        $objdocto->editar();
    elseif($op=="update")
        $objdocto->update();
        elseif($op=="insertar")
            $objdocto->insertar();
        elseif($op=="recibir")
            $objdocto->recibir();
            elseif($op=="eliminar")
                $objdocto->eliminar();
?>
