<?=$cabecera?>
<br>
<div class="card">
        <div class="card-body">
        <h5 class ="card-title">Ingresar datos del turista</h5>
        <p class="card-text">

    <form method="post" action="<?=Base_url('guardar_turista')?>" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-md">
        <label for="p_nombre">Primer nombre *:</label>
        <input id="p_nombre" value ="<?=old('p_nombre')?>" class="form-control" name="p_nombre" type="text">
        </div>
        <div class="form-group col-md">
        <label for="s_nombre">Segundo nombre:</label>
        <input id="s_nombre" value ="<?=old('s_nombre')?>" class="form-control" name="s_nombre" type="text">
        </div>
        <div class="form-group col-md">
        <label for="p_apellido">Primer apellido *:</label>
        <input id="p_apellido" value ="<?=old('p_apellido')?>" class="form-control" name="p_apellido" type="text">
        </div>
        <div class="form-group col-md">
        <label for="s_apellido">Segundo apellido *:</label>
        <input id="s_apellido" value ="<?=old('p_apellido')?>" class="form-control" name="s_apellido" type="text">
        </div>

    </div>

    <div class="form-row">
        <div class="form-group col-md-8">
        <label for="email">Dirreción de correo electronico *:</label>
        <input id="email"placeholder="MiCorreo@example.com" value ="<?=old('email')?>" class="form-control" name="email" type="email">
        </div>
        <div class="form-group col-md-4">
        <label for="telefono">Nro. celular:</label>
        <input id="telefono" value ="<?=old('telefono')?>" class="form-control" name="telefono" type="text">
        </div>

    </div>

    <div class="form-row">
        <div class="form-group col-md">
        <label for="imagen">Seleccione una imagen:</label>
        <input id="imagen" class="form-control" name="imagen" type="file">
        </div>
        <div class="form-group col-md">
        <label for="contasena">Contraseña *:</label>
        <input id="contasena" placeholder="Defina una contraseña para el inicio de sesión" class="form-control" name="contasena" type="password">
        </div>

    </div>


    <div class="form-group">
    <label style="color: red" for="s_nombre">Los campos con asterisco (*) son obligatorios</label>
    </div>
    <div class="text-center">
    <button class="btn" style="background-color: #36907A; color:white" type="submit">Registar</button>
 <a  href="<?=base_url('ir');?>" class="btn btn-info" style="color:white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-square-fill" viewBox="0 0 16 16">
  <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm10.5 10V4a.5.5 0 0 0-.832-.374l-4.5 4a.5.5 0 0 0 0 .748l4.5 4A.5.5 0 0 0 10.5 12z"/>
</svg> Atras</a>
   
    </div>
  
    </form>
        </p>
        </div>
    </div>

    <?=$pie?>