<?php
require_once 'paginas/header.php';
?>
<div class="row">
    <div class="col-md-3"></div>
        <div class="col-md-6"> 

    <form class="form-group"method="post" action="altaUsuario.php">
         <label class="form-group">Nombre</label><input type="text"name="nombre" >
         <label class="form-group">Password</label><input type="password" name="password">
         <button class="btn btn-success"type="submit" name=" submit">Registrar</button>
    </form>
                  </div>
       <div class="col-md-3"></div>  
            
</div>    



<?php
require_once 'paginas/footer.php';
