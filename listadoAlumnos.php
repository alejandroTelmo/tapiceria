<?php
require_once './paginas/header.php';
require_once './Clases/Alumno.php';
use app\Clases\Alumno;
?>

<?php
if(isset($_POST['submit'])&& isset($_SESSION['usuario'])){
    $nom=$_POST['nombre'];
    $tel=$_POST['telefono'];
    $dir=$_POST['direccion'];
    $idCurso=$_POST['id_curso'];
    
    $alumna= Alumno::crearDesdeParametros($_POST);
    $alumna->insertar();
  
    
}
?>
<div class="row">
    
        <div class="col-md-6"> 
            <form>
                <label>Buscar alumno</label><input name="buscarAlumno">
                <button class="naranja" name="submit" type="submit">Buscar</button>
            </form>
        </div>
       



    
        <div class="col-md-6"> 
            <form>
                <label>Buscar alumnos por curso</label><input name="buscarAlumnoPorCurso">
                <button class="naranja" name="submitAlumnoPorCurso" type="submit">Buscar</button>
            </form>
        </div>
       

</div>
<div class="table-responsive">

    <table class="table-striped">    <div > <h3 class="mx-auto">Listado Alumnos</h3></div>
        <tr><th>Id</th><th>Nombre</th><th>Dirección</th><th>Telefóno</th><th>Id Curso</th><th>Eliminar</th><th>Actualizar</th><th>Insertar Trabajo</th></tr>
    <?php
    echo $_SESSION['mensaje'];
    //si esta la session del usuario me muestra listado de alumnos, considero que debe ser sólo de interes del administrador el listado de alumnos
    if(isset($_SESSION['usuario'])){
        if(isset($_GET['submit'])&& ($_GET['buscarAlumno'])!==''){
            $param=$_GET['buscarAlumno'];
            $alumno= Alumno::buscarAlumnos($param);
            
        }else{
            $alumno= Alumno::todosLosAlumnos();
        }
    foreach($alumno as $alumnos){
        echo "<tr><td>{$alumnos['id']}</td><td>{$alumnos['nombre']}</td><td>{$alumnos['direccion']}</td><td>{$alumnos['telefono']}</td><td>{$alumnos['id_curso']}</td><td><a href='bajaAlumno.php?delId={$alumnos['id']}'><button class='btn btn-danger'>Borrar</button></td><td><button class='btn btn-success'>Actualizar</button></td><td><a href='formAltaTrabajos.php?delId={$alumnos['id']}'><button class='btn btn-primary'>agregar </button></td></tr>";
        }
    }
    if(isset($_SESSION['usuario'])){
        if(isset($_GET['delIdAlumnos'])){
            $param= intval($_GET['delIdAlumnos']);
            $alumno= Alumno::alumnosDeUnCurso($param);
            
        }
            foreach($alumno as $alumnos){
        echo "<tr><td>{$alumnos['id']}</td><td>{$alumnos['nombre']}</td><td>{$alumnos['direccion']}</td><td>{$alumnos['telefono']}</td><td>{$alumnos['id_curso']}</td><td><a href='bajaAlumno.php?delId={$alumnos['id']}'><button class='btn btn-danger'>Borrar</button></td><td><button class='btn btn-success'>Actualizar</button></td><td><a href='formAltaTrabajos.php?delId={$alumnos['id']}'><button class='btn btn-primary'>agregar </button></td></tr>";
        }
    }
    ?>
    </table></div>













<?php
require_once 'paginas/footer.php';
