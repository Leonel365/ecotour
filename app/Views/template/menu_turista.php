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
<?php 
use App\Models\turista;
session_start();

  $correo = $_SESSION['usuario'];
  $turista = new Turista();
  $datos = $turista->where('usuario',$correo)->findAll();

  foreach($datos as $libro ):
    $nombre=$libro['primer_nombe'];   
  endforeach;


?>
<nav class="navbar navbar-expand-lg navbar-light"  style="background-color: #36907A">
  <a class="navbar-brand logo" href="<?=Base_url('menu_turista')?>"><img src="../public/fotografias/logo.png" alt="EcoTour"  width="85" height="85"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarScroll">
    <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
      <li class="nav-item active">
        <a class="nav-link" href="<?=Base_url('menu_turista')?>"><b style="color:  #FDFEFE">Inicio</b> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=Base_url('biotour_t')?>"><b  style="color:  #FDFEFE">Bioturismo</b></a>
      </li>
      </ul>
    
      <ul class="navbar-nav" style="max-height: 100px;">
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" style="color: #FDFEFE">
      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
    </svg>
          </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><?php echo $nombre;?></a>
          <a class="dropdown-item" href="#">Chat</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?=Base_url('salir')?>">Cerrar sesión</a>
        </div>
      </li>
     </ul>
    
    <form class="d-flex" method="post" action="<?=Base_url('buscar_t')?>" enctype="multipart/form-data">
      <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search" name="buscar">
      <button class="btn btn-outline-light" type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" style="color: #FDFEFE">
      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
</button>
    </form> 
  
   

  </div>
</nav>


    <div class="container">

