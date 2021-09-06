<?=$cabecera?>

<br>
<div class="card">
        <div class="card-body">
        <h5 class ="card-title">Ingresar datos del plan turistico</h5>
        <p class="card-text">

    <form method="post" action="<?=Base_url('guardar_plan')?>" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-6">
        <label for="nombre">Nombre del lugar *:</label>
        <input id="nombre" value ="<?=old('nombre')?>" class="form-control" name="nombre" type="text">
        </div>
        <div class="form-group col-md">
        <label for="precio">Precio del plan *:</label>
        <input id="precio" value ="<?=old('precio')?>" class="form-control" name="precio" type="text">
        </div>
        <div class="form-group col-md">
        <label for="categoria">Categoria *:</label>
        <select class="custom-select mr-sm-2" id="categoria" name = "categoria">
        <option selected>Seleccione...</option>
        <option value="atardecer">Atarcedecer en Familia</option>
        <option value="caminatas">Caminatas y aire fresco</option>
        <option value="pareja">Plan en pareja</option>
        <option value="naturaleza">Naturaleza y comida</option>
        <option value="animal">Contacto animal</option>
        <option value="agua">Cerca del agua</option>
    </select>
      </div>
           

    </div>

    <div class="form-row">
    <div class="form-group col-md">
        <label for="departamento">Departamento *:</label>
        <input id="departamento" value ="<?=old('departamento')?>" class="form-control" name="departamento" type="text">
        </div>
    <div class="form-group col-md">
        <label for="ciudad">Ciudad *:</label>
        <input id="ciudad" value ="<?=old('ciudad')?>" class="form-control" name="ciudad" type="text">
        </div>
        <div class="form-group col-md">
        <label for="vereda">Vereda *:</label>
        <input id="vereda" value ="<?=old('vereda')?>" class="form-control" name="vereda" type="text">
        </div>
    <div class="form-group col-md">
        <label for="calle">Calle *:</label>
        <input id="calle" value ="<?=old('calle')?>" class="form-control" name="calle" type="text">
        </div>
        <div class="form-group col-md">
        <label for="imagen">Seleccione una imagen:</label>
        <input id="imagen" class="form-control" name="imagen" type="file">
        </div>

    </div>

    <div class="form-row">
       
        <div class="form-group col-md">
        <label for="descripcion">Descriptición *:</label>
        <textarea  class="form-control" name="descripcion" id="descripcion" rows="6"></textarea>
    
        </div>

    </div>


    <div class="form-group">
    <label style="color: red" for="s_nombre">Los campos con asterisco (*) son obligatorios</label>
    </div>
    <div class="text-center">
    <button class="btn" style="background-color: #36907A; color:white" type="submit">Registar</button>
 <a  href="<?=base_url('menu_empresa');?>" class="btn btn-info" style="color:white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-square-fill" viewBox="0 0 16 16">
  <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm10.5 10V4a.5.5 0 0 0-.832-.374l-4.5 4a.5.5 0 0 0 0 .748l4.5 4A.5.5 0 0 0 10.5 12z"/>
</svg> Atras</a>
   
    </div>
  
    </form>
        </p>
        </div>
    </div>


<?=$pie?>