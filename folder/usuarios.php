<?php
require_once '../controlador/usuarioscontrolador.php';
$objusuario=new usuarioscontrolador();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objusuario->mostrar();
    elseif ($op=="nuevo")
        $objusuario->nuevo();
    elseif ($op=="guardar")
        $objusuario->guardar();
    elseif ($op=="editar")
        $objusuario->editar();
    elseif($op=="update")
        $objusuario->update();
        elseif($op=="insertar")
            $objusuario->insertar();
        elseif($op=="recibir")
            $objusuario->recibir();
            elseif($op=="eliminar")
                $objusuario->eliminar();
?>
