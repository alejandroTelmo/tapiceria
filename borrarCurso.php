<?php
session_start();
require_once 'cursos.php';
require_once './Clases/Db.php';

if(isset($_GET['delId'])&& isset($_SESSION['usuario'])){
$id=$_GET['delId'];

 $sql = 'delete from curso where id = :id';
// obtener conexión
$conn= \app\clases\Db::getConexion();
// preparar la sentencia 
$pst=$conn->prepare($sql);
// hacer el bindValue correspondiente
$pst->bindValue(':id', $id);
// ejecutar
$pst->execute();
$resultado=$pst->rowCount();
// si el rowCount de la ejecución es distinto de 1 escribir en la sesión (mensaje) que algo salió mal
if($resultado!==1){
    $_SESSION['mensaje']="Algo salío mal";
    header("Location:index.php");
    exit();
} else{
    $_SESSION['mensaje']="Operación de borrado exitosa !!!";
    header("Location:cursos.php");
    exit();
}
}else{
    $_SESSION['mensaje']="No tiene los permisos, debe loguearse";
}