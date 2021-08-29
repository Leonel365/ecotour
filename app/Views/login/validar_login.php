
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
<body style="background-color:#E3FFF8">
<?php 

 
    $mensaje="";
    $sw=0;

  /**  if( isset($_POST['user']) ){
        $sw=1;

        $user=$_POST['user'];
        $password1= $_POST['password'];
        $password = sha1($password1);
        $id_tipo_usuario=0;

        $sql="SELECT usuario,id_tipo_usuario FROM usuarios WHERE usuario='$user' AND password='$password' AND estado='A'";
        $resultado = $mysqli->query($sql);
        while($fila = $resultado->fetch_assoc()){
            $sw=2;
            $id_tipo_usuario=$fila['id_tipo_usuario'];
        }
        if($sw==1){
            $mensaje="El usuario y contraseña ingresados no son validos!!!";
        }
        if($sw==2){
            session_start();
            $_SESSION['usuario']=$user;
            $_SESSION['password']=$password;
            $_SESSION['id_tipo_usuario']=$id_tipo_usuario;

            ?>

            <script>
                window.parent.location="../menus/menu_persona.php";
            </script>

            <?php
        }



    }
**/


?>
<div class="text-center">
    <img class="block-center" src="../../public/carousel/login.png" width="120px">
                              
</div>


<form method="POST" action="validar_login.php">
    <div class="form-group">
        <label for="user">Nombre de Usuario:</label>
        <input id="user" type="text" name="user" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Contraseña:</label>
        <input id="password" type="password" name="password" class="form-control">
    </div>
     <p class="text-danger"><?php echo "$mensaje" ; ?> </p>
    <div class="text-center">
        <div class="text-center">
            <a href="<?=site_url('lobby')?>"><b>¿Aún no tienens una cuenta?</b></a>
        </div>
        <br>
        <input type="submit" class="btn" style="background-color: #36907A" value="Login">
    </div>
</form>


</div>
</body>
</html>