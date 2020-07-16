<?php

require_once './paginas/header.php';
require_once './Clases/Curso.php';
use \app\Clases\Curso;


//require_once 'nuevoCurso.php';

?>
<?php
if(isset($_POST['submit']) && isset($_SESSION['usuario'])){
    $nom=$_POST['nombre'];
    $cupo=$_POST['cupo'];
    $curso= Curso::crearDesdeParametros($nom, $cupo);
    $curso->insertar();
    
}
?>
<div class="row">
  
      <h1 class="mx-auto"> Cursos de Tapicería Integral</h1> 
  
</div>
<div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6"> 

    <form >
          
          <label class="">Buscar Curso</label><input name="buscarCurso">
          <button class="btn naranja" name="submit">Buscar</button>
          
      </form>
        </div>
                <div class="col-md-3"></div>

</div>
    


    <div class="row">

        <div class="col-md-12">
                    <table class="table"> 
              
                        <th>Id</th><th>Nombre</th> <th>Disponibilidad</th><th>Alumnos</th><th>Inscripción</th><?php if(isset($_SESSION['usuario'])){echo"<th>Borrar</th>";}?> 
                <?php 
                if(isset($_SESSION['mensaje'])){
                echo $_SESSION['mensaje'];
                unset($_SESSION['mensaje']);
                }
                if(isset($_GET['submit'])&& ($_GET['buscarCurso'])!==''){
                    $cursos= Curso::buscarCurso($_GET['buscarCurso']);
                }else{
                    $cursos= Curso::todosLosCursos();
                }
                if(isset($_SESSION['usuario'])){
                foreach($cursos as $losCursos)
                {
                    echo "<tr><td>{$losCursos['id']}</td>"
                    . "<td>{$losCursos['nombre']}</td>"
                    . "<td>{$losCursos['cupo']}</td>"
                    . "<td><a href='listadoAlumnos.php?delIdAlumnos={$losCursos['id']}'>Alumnos inscriptos</a></td>"
                    . "<td><a href='altaAlumno.php?delId={$losCursos['id']}'>Inscribirse</a></td>"
                    . "<td><a href='borrarCurso.php?delId={$losCursos['id']}'> Borrar</a></td></tr>";
                }
                } else {
                    foreach($cursos as $losCursos)
                {
                    echo "<tr><td>{$losCursos['id']}</td>"
                    . "<td>{$losCursos['nombre']}</td>"
                    . "<td>{$losCursos['cupo']}</td><td><a href='altaAlumno.php?delId={$losCursos['id']}'>Inscribirse</a></td>";
                    
                }
                }
                ?>
            </table>
            <?php
            //si existe la session del usuario, puedo agregar cursos
            if(isset($_SESSION['usuario'])){
            echo"<div> <a href='nuevoCurso.php'><button class='btn btn naranja'>Agregar curso</button></a></div>";
            }
            ?>
        </div>
 
    </div>
        






<?php
require_once 'paginas/footer.php';
?>