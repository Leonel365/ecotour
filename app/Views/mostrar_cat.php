<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <title>Ecotour</title>
</head>
<body >

<nav class="navbar navbar-expand-lg navbar-light"  style="background-color: #36907A">
  <a class="navbar-brand logo" href="<?=Base_url('inicio')?>"><img src="../../public/fotografias/logo.png" alt="EcoTour"  width="50" height="50"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarScroll">
    <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
      <li class="nav-item active">
        <a class="nav-link" href="<?=Base_url('inicio')?>"><b style="color:  #FDFEFE">Inicio</b> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=Base_url('biotour')?>"><b style="color:  #FDFEFE">Bioturismo</b></a>
      </li>
      </ul>
     
    <form class="d-flex"  method="post" action="<?=Base_url('buscar_pn')?>" enctype="multipart/form-data">
      <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search" name="buscar" >
      <button class="btn btn-outline-light" type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" style="color: #FDFEFE">
      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
</button>
    </form> 
  
    <a class="nav-link" href="<?=Base_url('lobby_login')?>">
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" style="color: #FDFEFE">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
      </a>

  </div>
</nav>


    <div class="container">


<?php 
$db = \Config\Database::connect();


 $query = $db->query($sql);
 $results = $query->getResultArray();

 $cont = 1;
 $sw1 = 0;
 $sw2= 1;
 foreach ($results as $row)
     {

     $nombre = $row['nombre'];
     $descripcion = $row['descripcion'];
     $id_lugar = $row['idLugar_Turistico'];
     $sql3 = "SELECT fotografia FROM catalogo_lugares WHERE idLugar_Turistico = $id_lugar";
  
     $query = $db->query($sql3);
     $resultado = $query->getResultArray();
     foreach ($resultado as $row)
     {
     $foto = $row['fotografia'];
     }
     if($sw1 == 0){
         echo  "<div class='row'>";
         $sw1 = 1;
     }
   
     echo "<div class='col-3'>";
   
     ?>
     <div class="card" style="width: 18rem;">
   <?php  echo "<p style = 'text-align: center'><b>$nombre</b></p>"; ?>
     <a href="<?=Base_url('lugar/'.$id_lugar)?>"><img src="<?=base_url()?>/fotografias/<?=$foto?>" class="card-img-top"  height="150" width="235" alt="portada del libro"></a>
         <div class="card-body">
      <?php   echo "<p style = 'text-align: justify'>".substr($descripcion, 0, 100)."...</p>"; ?>
         </div>
         </div>
     
    <?php
   
     echo "</div>";
     if($cont==4){
         $cont = 0;
         $sw1 = 0;
         $sw2 = 0;
     }
     if($sw2 == 0){
         echo "</div>";
         $sw2 = 1;
       } 


 $cont++;
     }
     $cont--;

     if($cont != 4){
         echo "</div>";
     }

?>

<?=$pie?>