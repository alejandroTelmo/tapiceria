<?php
declare(strict_types=1);

namespace app\Clases;
require_once 'Db.php';


use \PDO;

/**
 * Description of Usuario
 *
 * @author 
 */
class Usuario {
    // conexión
    /**
     *
     * @var \PDO 
     */
    protected $bd;
        
    public function __construct() {
        $this->bd = Db::getConexion();
    }
    
    public function esLoginValido(string $usuario, string $password): bool{
        $sql = 'select * from usuario where nombre = :nombre';
        $pst = $this->bd->prepare($sql);
        $pst->bindValue(':nombre', $usuario, PDO::PARAM_STR);
        $pst->execute();
        $resultados = $pst->fetchAll();
        if(count($resultados)===1){
           password_verify($password, $resultados[0]['password']);
              return true;
        }else{
            return false;
        }
    }
    public static function buscarUsuarios($param):array
    {   
        $nom='%'.$param.'%';
        $conn= \app\Clases\Db::getConexion();
        $sql='SELECT * FROM usuario WHERE nombre LIKE :nombre ';
        $pst=$conn->prepare($sql);
        $pst->bindValue(':nombre',$nom);
        
        $pst->execute();
        $res=$pst->fetchAll();
        return $res;
    }
    
    public static function todosLosUsuarios():array
{
    $conn=Db::getConexion();
    $sql='SELECT * FROM usuario';
    $pst=$conn->query($sql);
    $pst->execute();
    $res=$pst->fetchAll();
    
    return $res;
    
}
        public function registrarUsuario(string $usuario,string $password): bool 
        {
        $sql = 'insert into usuario (nombre,password) values (:nombre,:clave)';
        $pst = $this->bd->prepare($sql);
        $pst->bindValue(':nombre', $usuario, PDO::PARAM_STR);
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $pst->bindValue(':clave', $hashPass, PDO::PARAM_STR);
        $pst->execute();
        if($pst->rowCount()===1){
            return true;
        }else{
            return false;
        }
        
    }
    
}
