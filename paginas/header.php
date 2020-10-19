<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title >Escuela de Tapicería</title>

        <meta name="description" content="Source code generated using layoutit.com">
        <meta name="author" content="LayoutIt!">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     

        <link href="css/style.css" rel="stylesheet">

        <style>
         
        </style>
  <?php
        session_start();
        ?>

    </head>
    <body>
      
         <div class="container-fluid"> 
             <a href="index.php"> <img src="imagenes/150x150.png"></a>
            <div class="row" >
                
                <div class="col-12 text-center titu"></div>
   
            </div> 
            <div class="row naranja" >
               
                <nav class="naranja navbar navbar-expand-lg">
                    <a class="navbar-brand" href="index.php">Principal</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                          <a class="nav-link" href="cursos.php">Cursos <span class="sr-only">(current)</span></a>
                      </li>
                     
                       <li class="nav-item">
                           <a class="nav-link" href="galeria.php">Galería</a>
                      </li>
                      <?php
                      if(isset($_SESSION['usuario'])){
                       echo "<li class='nav-item'>".
                            "<a class='nav-link' href='listadoAlumnos.php'>Alumnos</a> </li>";
                      
                      } ?>
                           <?php
                      if(isset($_SESSION['usuario'])){
                         echo" <li class='nav-item'>".
                      "<a class='nav-link' href='usuario.php'>Registrar usuario</a> </li>";
                   
                              }?>
     
                      <?php
                      if(!isset($_SESSION['usuario'])){
                      echo "<li class='nav-item'>".
                           "<a class='nav-link' href='login.php'>Login</a>".
                      "</li>"; }else{
                       ?>
                      <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout(<?=$_SESSION['usuario']?>)</a>
                      </li>
                      <?php }?>
                    </ul>

			</div>	
                </nav>   
            </div>

            <div class="row" >
                
                <div class="col-10 text-center tituloPrincipal"><h1 class="negro" > Escuela de Tapicería</h1></div>
   
                <div class="col-2"><img src="imagenes/faceTransNaran.png"> <img src="imagenes/marron.png"><img src="imagenes/what.png">
                </div> </div> 
