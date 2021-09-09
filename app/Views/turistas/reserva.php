<?=$cabecera?>
<p><br><br><br><br></p>
<form method="post" action="<?=Base_url('buscar_oferta')?>" enctype="multipart/form-data">

  <div class="form-row align-items-center">
    <div class="col-2">

    </div>
      <div class="col-2">
      <label  for="inlineFormInput">¿Cúando voy? *:</label>
      </div>
    <div class="col-3">
     <input type="hidden"value = "<?=$id_lugar?>" name="id_lugar">
      <input type="date" class="form-control mb-2" value="<?php echo date('Y-m-d');?>" id="inlineFormInput" name = "fecha_ida">
    </div>
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup">Mi presupuesto *:</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">$</div>
        </div>
        <input type="text" class="form-control" name = "presupuesto" id="inlineFormInputGroup" placeholder="Presupuesto">
      </div>
    </div>
   
    <div class="col-auto">
    <button class="btn mb-2" style="background-color: #36907A; color:white" type="submit">Buscar oferta</button>
    </div>
  </div>
</form>
<p><br><br><br><br><br></p>
<?=$pie?>