<?php
require_once './paginas/header.php';
?>


<div class="text-center">
    <h2>Nuevo Trabajo</h2>
    <form method="post" action="galeria.php">
        <label class="form-control">Nombre</label><input type="text"name="nombre">
        <label class="form-control">Precio</label><input type="text" name="precio">
        
        <label class="form-control">Id Alumno</label><input type="text" name="id_alumno"value="<?=$_GET['delId']?>">
        <button class="btn btn-primary" name="submitAltaTrabajo">Agregar</button>
    </form>
</div>


 





<?php
require_once './paginas/footer.php';