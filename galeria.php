<?php
require_once './paginas/header.php';
require_once './Clases/Trabajo.php';
use app\Clases\Trabajo;

?>
<?php

if(isset($_POST['submitAltaTrabajo'])&& isset($_SESSION['usuario'])){
    $nom=$_POST['nombre'];
    $precio=$_POST['precio'];
    $idAlumno= intval($_POST['id_alumno']);
    
    
    $trabajo= Trabajo::crearDesdeParametros($_POST) ;
    $trabajo->insertar();
  
    
}
?>
<div class="row">
<div class="col-md-12 text-center">
   <h3>Creaciones de los alumnos</h3> 
</div></div>

    <div class="row">
        <div class="col-12">
                            <?php
                                
        if(isset($_GET['buscarTrabajo'])&&($_GET['buscarTrabajo'])!==''){
            $param=$_GET['buscarTrabajo'];
            $trabajo= Trabajo::buscarTrabajo($param);
            
        }else{
            $trabajo= Trabajo::todosLosTrabajos();
        }
    foreach($trabajo as $tra){
        
        echo"<div class='col-md-4 img-contenedor creaciones'>".
                                     " <img src='imagenes/{$tra['nombre']}.jpg' alt=''  class='img-thumbnail'>".
				"<label>Precio :\${$tra['precio']}</label></div>";
		
        }
    
                        	
                            ?>
          </div>     
        </div>

 <?php
 require_once 'paginas/footer.php';
 