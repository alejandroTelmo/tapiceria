<?php

namespace app\Clases;
require_once 'Clases/Db.php';
use \app\clases\Db;
/**
 * Description of Curso
 *
 * @author yo
 */
class Curso {
  private $id;
  private $cupo;
  private $nombre;
  
  public function __construct(string $nombre,int $cupo,int $id=null) {
      $this->id=$id;
      $this->nombre=$nombre;
      $this->cupo=$cupo;
  }

public function getId()
{
    $this->id;
}

public function getCupo()
{
    $this->cupo;
}
public function getNombre()
{
    $this->nombre;
}

public function hayLugar(): bool
{
    
}


public function setId($param)
{
    $this->id=intval($param);
    
}
public static function crearDesdeParametros( $nom,$cupo):self
{
    $nombre=$nom??null;
    $cupos=intval($cupo)??null;
    $cursoNuevo=new Curso($nombre,$cupos);
    return $cursoNuevo;
}
//recibe un parametro y devuelve un array con todos los cursos encontrados

public static function buscarCurso(string $param):array
{
    $nombre='%'.$param.'%';
    $conn= Db::getConexion();
    $sql='SELECT * FROM curso WHERE nombre  LIKE :nombre';
    $pst=$conn->prepare($sql);
    $pst->bindValue(':nombre',$nombre);
    $pst->execute();
    $res=$pst->fetchAll();
    if(count($res)!==0)
      return $res;
  return ['so','yo'];
    
}

public static function todosLosCursos():array
{
    $conn=Db::getConexion();
    $sql='SELECT * FROM curso';
    $pst=$conn->query($sql);
    $pst->execute();
    $res=$pst->fetchAll();
    return $res;
    
}
public function insertar(): bool
{
$conn= Db::getConexion();
$sql='insert into curso (cupo,nombre) values (:cupo,:nombre)';
$pst=$conn->prepare($sql);
$pst->bindValue(':cupo', $this->cupo);
$pst->bindValue(':nombre', $this->nombre);
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
