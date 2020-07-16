<?php
require_once 'paginas/header.php';
?>
<div class="text-center">
    <h2>Nuevo Alumno</h2>
    <form method="post" action="listadoAlumnos.php">
        <label class="form-control">Nombre</label><input type="text"name="nombre">
        <label class="form-control">Dirección</label><input type="text" name="direccion">
        <label class="form-control">Teléfono</label><input  type="text"name="telefono">
        <label class="form-control">Curso</label><input type="text" name="id_curso"value="<?=$_GET['delId']?>">
        <button class="btn btn-primary"type="submit" name="submit">Registrar</button>
    </form>
</div>


<?php
require_once 'paginas/footer.php';
