<?php

require_once 'header.php';
require_once './Clases/Usuario.php';
use app\Clases\Usuario;

$usuario=new Usuario();


//require_once 'nuevoCurso.php';

?>
<?php
if(isset($_POST['submit']) && isset($_SESSION['usuario'])){
    $nom=$_POST['nombre'];
    $pass=$_POST['password'];
    $usuario->registrarUsuario($nom, $pass);
    
    
}
?>
<div class="row">
  <div class="col-8 text-center tituloPrincipal">
      <h1> Cursos de Tapicería Integral</h1> 
  </div>
    <div class="col-4">
      <form>
          <div class="">
          <label class="">Buscar Curso</label><input name="buscarCurso">
          <button class="btn naranja" name="submit">Buscar</button>
          </div>
      </form>
    </div>
    <div ></div>
  </div>







<?php
require_once 'paginas/footer.php';
?>