<?php
require_once 'paginas/header.php';
?>
<div>
    <form method="post" action="cursos.php">
        <div><label class="form-control">Nombre</label><input type="text"name="nombre"></div>
        <div><label class="form-control">Cupo</label><input type="text" name="cupo"></div>
        <div> <button type="submit" name=" submit">Registrar</button></div>
    </form>
</div>    



<?php
require_once 'paginas/footer.php';

