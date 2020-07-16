<?php
namespace app\Clases;
require_once 'Db.php';
use app\Clases\Db;

/**
 * Description of Alumno
 *
 * @author yo
 */
class Alumno {
    //put your code here
    private $id;
    private $nombre;
    private $telefono;
    private $direccion;
    private $id_curso;
    
    public function __construct(string $nombre, string $telefono, string $direccion,int $id_curso, int $id=null) 
    {
        $this->nombre=$nombre;
        $this->telefono=$telefono;
        $this->direccion=$direccion;
        $this->id_curso=$id_curso;
        $this->id=$id;
    }
    
    public function getId(): int
    {
        $this->id;
    }
    
    public function getNombre(): string
    {
        $this->nombre;
    }
    public function getTelefono(): string
    {
        $this->telefono;
    }
    public function getDireccion(): string
    {
        $this->direccion;
    }
    public function getIdCurso(): int
    {
        $this->id_curso;
    }
    public function setId($valor)
    {
        $this->id=intval($valor);  
    }
    public static function alumnosDeUnCurso($param):array
    {
        $idCurso=intval($param);
        $conn=Db::getConexion();
        $sql='SELECT * FROM alumnos WHERE id_curso=:idCurso';
        $pst=$conn->prepare($sql);
        $pst->bindValue(':idCurso',$idCurso);
        $pst->execute();
        $res=$pst->fetchAll();
        return $res;
    }
     public static function buscarAlumnos($param):array
    {   
        $nom='%'.$param.'%';
        $conn=Db::getConexion();
        $sql='SELECT * FROM alumnos WHERE nombre LIKE :nombre OR direccion LIKE :direccion';
        $pst=$conn->prepare($sql);
        $pst->bindValue(':nombre',$nom);
        $pst->bindValue(':direccion',$nom);
        $pst->execute();
        $res=$pst->fetchAll();
        return $res;
    }
        public static function todosLosAlumnos():array
    {
        $conn=Db::getConexion();
        $sql='SELECT * FROM alumnos';
        $pst=$conn->query($sql);
        $pst->execute();
        $res=$pst->fetchAll();
        return $res;
    }
    
    public static function crearDesdeParametros(array $param):self
    {
     $nom=$param['nombre']??'';
     $dir=$param['direccion']??'';
     $tel=$param['telefono']??'';
     $idCurso=$param['id_curso']??null;
     $id=$param['id']??null;
     $alumno=new Alumno($nom,$tel,$dir,$idCurso,$id);
     return $alumno;
    }
    public function insertar()
    {
        $conn=Db::getConexion();
        $sql='insert into alumnos (nombre,telefono,direccion,id_curso) values (:nombre,:telefono,:direccion,:id_curso)';
        $pst=$conn->prepare($sql);
        $pst->bindValue(':nombre', $this->nombre);
        $pst->bindValue(':telefono', $this->telefono);
        $pst->bindValue(':direccion', $this->direccion);
        $pst->bindValue(':id_curso', $this->id_curso);
        $pst->execute();
        $res=$pst->rowCount();
        if($res===1){
            $this->setId($conn->lastInsertId());
            return true;
        }
        return false;
    }
        
}
