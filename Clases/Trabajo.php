<?php

namespace app\Clases;
require_once 'Clases/Db.php';
use \app\clases\Db;
/**
 * Description of Curso
 *
 * @author yo
 */
class Trabajo {
  private $id;
  private $nombre;
  private $precio;
  private $id_alumno;
  
  public function __construct(string $nombre,int $precio=null, int $id_alumno,int $id=null) {
      $this->id=$id;
      $this->nombre=$nombre;
      $this->precio=$precio;
      $this->id_alumno=$id_alumno;
  }

public function getId()
{
    $this->id;
}

public function getPrecio()
{
    $this->precio;
}
public function getNombre()
{
    $this->nombre;
}
public function getIdAlumno()
{
    return $this->id_alumno;
}

public function setId($param)
{
    $this->id=intval($param);
    
}
public static function crearDesdeParametros(array $param):self
{
    $nom=$param['nombre'];
    $precio=$param['precio']??null;
    $idAlumno= intval($param['id_alumno']);
    $trabajoNuevo=new Trabajo($nom,$precio,$idAlumno);
    return $trabajoNuevo;
}
//recibe un parametro y devuelve un array con todos los cursos encontrados

public static function buscarTrabajo(string $param):array
{
    $nombre='%'.$param.'%';
    $conn= Db::getConexion();
    $sql='SELECT * FROM trabajos WHERE nombre  LIKE :nombre';
    $pst=$conn->prepare($sql);
    $pst->bindValue(':nombre',$nombre);
    $pst->execute();
    $res=$pst->fetchAll();
    if(count($res)!==0)
      return $res;
  return ['so','yo'];
    
}

public static function todosLosTrabajos():array
{
    $conn=Db::getConexion();
    $sql='SELECT * FROM trabajos';
    $pst=$conn->query($sql);
    $pst->execute();
    $res=$pst->fetchAll();
    return $res;
    
}
public function insertar(): bool
{
$conn= Db::getConexion();
$sql='insert trabajos (nombre,precio,id_alumno) values (:nombre,:precio,:idAlumno)';
$pst=$conn->prepare($sql);

$pst->bindValue(':nombre', $this->nombre);
$pst->bindValue(':precio', $this->precio);
$pst->bindValue(':idAlumno', $this->id_alumno);
$pst->execute();
$res=$pst->rowCount();
if(count($res)===1){
    $this->setId($conn->lastInsertId());
    return true;
}else{
    return false;
}
}
 

}