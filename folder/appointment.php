<?php
require_once '../controlador/appointmentcontrolador.php';
$objappo=new appointmentcontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objappo->mostrar();
    elseif ($op=="nuevo")
        $objappo->nuevo();
    elseif ($op=="guardar")
        $objappo->guardar();
    elseif ($op=="editar")
        $objappo->editar();
    elseif($op=="update")
        $objappo->update();
        elseif($op=="insertar")
            $objappo->insertar();
        elseif($op=="recibir")
            $objappo->recibir();
            elseif($op=="eliminar")
                $objappo->eliminar();
?>
