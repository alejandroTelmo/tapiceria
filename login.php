<?php

require_once './paginas/header.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once './Clases/Usuario.php';
use app\Clases\Usuario;
$usuario = new Usuario();
// completar el código de acuerdo a los datos correctos

if(isset($_POST['boton'])  &&  $usuario->esLoginValido($_POST['username'],$_POST['password'])){
    $_SESSION['usuario'] = $_POST['username'];
 
     header("Location:index.php");
    exit();
}else if(!isset($_SESSION['usuario'])){

    $_SESSION['mensaje'] = "Login Inválido: registrese o vuelva a cargar sus datos";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" />
        <link rel="stylesheet" href="../css/style.css" />

        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container-fluid main-content">
            
                <div class="login-content">

                    <div class="text-center">
                        <h2>Login</h2>

                        <div class="alert">
                            <div>
                                <?php
                                    
// SI EXISTE EL MENSAJE, lo escribo y luego lo borro (unset($_SESSION['mensaje']))
                                if(isset($_SESSION['mensaje'])){
                                  echo $_SESSION['mensaje']; 
                                  unset($_SESSION['mensaje']);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4"></div>
                          <div class="col-md-4">
                            <form  method="POST">
                                <div class="form-group">
                                    <label class="control-label" for="username">Usuario:</label>
                                    <div class="controls">
                                        <input id="username" type="text" name="username" value="" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="password" >Password:</label>
                                    <div class="controls">
                                        <input id="password" type="password" name="password" value="" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <input value="Login" class="btn btn-primary" type="submit" name="boton">
                                      <!--  <button type="submit" value="Registrarse"><a href="registrarUsuario.php">Registrarse</a></button>-->
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                          <div class="col-md-4"></div>
                     </div>
                
            </div>
        
    </body>

</html>
