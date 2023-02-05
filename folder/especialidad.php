<?php
require_once '../controlador/specialtycontrolador.php';
$objspe=new specialtycontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objspe->mostrar();
    elseif ($op=="nuevo")
        $objspe->nuevo();
    elseif ($op=="guardar")
        $objspe->guardar();
    elseif ($op=="editar")
        $objspe->editar();
    elseif($op=="update")
        $objspe->update();
        elseif($op=="insertar")
            $objspe->insertar();
        elseif($op=="recibir")
            $objspe->recibir();
            elseif($op=="eliminar")
                $objspe->eliminar();
?>
