<?php
require_once '../controlador/horariocontrolador.php';
$objhora=new horariocontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objhora->mostrar();
    elseif ($op=="nuevo")
        $objhora->nuevo();
    elseif ($op=="guardar")
        $objhora->guardar();
    elseif ($op=="editar")
        $objhora->editar();
    elseif($op=="update")
        $objhora->update();
        elseif($op=="insertar")
            $objhora->insertar();
        elseif($op=="recibir")
            $objhora->recibir();
            elseif($op=="eliminar")
                $objhora->eliminar();
?>
