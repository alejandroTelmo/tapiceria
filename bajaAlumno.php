<?php
session_start();
require_once './paginas/header.php';
require_once './Clases/Db.php';

use app\clases\Db;

if((isset($_SESSION['usuario']))&& isset($_GET['delId'])){
    $idAlumno= intval($_GET['delId']);
    $conn= Db::getConexion();
    $sql='DELETE FROM alumnos WHERE id =:id';
    $pst=$conn->prepare($sql);
    $pst->bindValue(':id',$idAlumno);
    $pst->execute();
    $res=$pst->rowCount();
    if($res===1){
        $_SESSION['mensaje']='Borrado exitoso' ;
        header('Location:listadoAlumnos.php');
        exit();
    }else{
        $_SESSION['mensaje']='Ocurrió un problema, verifique';
        header("Location:index.php");
    }
    
    
}else{
    header("Location:index.php");
    exit();
}