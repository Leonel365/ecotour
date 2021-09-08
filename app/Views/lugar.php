<?=$cabecera?>
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
     }
     $sql3 = "SELECT fotografia FROM catalogo_lugares WHERE idLugar_Turistico = $id_lugar";
  
     $query = $db->query($sql3);
     $resultado = $query->getResultArray();
     foreach ($resultado as $row)
     {
     $foto = $row['fotografia'];
     }
   
   $sql = "SELECT ciudad, departamento, vereda, calle FROM dirreccion_lugar WHERE idLugar_Turistico = $id_lugar";
   $query = $db->query($sql);
   $resultado = $query->getResultArray();
     foreach($resultado as $row){
        
         $ciudad = $row['ciudad'];
         $departamento = $row['departamento'];
         $vereda = $row['vereda'];
         $calle = $row['calle'];
     }
     ?>
     <br>
    <div class="row">
        <div class="col-12">
                <h3 class="text-center"><?=$nombre?></h3>
        </div>
   </div>
<p><br><br></p>
   <div class="row">
        <div class="col-sm">
        <img src="<?=base_url()?>/fotografias/<?=$foto?>" class="card-img-top"  height="300" width="235" alt="portada del libro">
        </div>
        <div class="col-sm">
                <h6 class="text-center">Descripcion:</h6>
                <p><?=$descripcion?></p>
        </div>
   </div>
   <p><br><br></p>
  
   <div class="row">
       <div class="col-1">

       </div>
       <div class="col-8">
       <table class="table">
  <thead>
      <tr class="table-active"> <th class="text-center" colspan="5" scope="col">Dirección</th></tr>
    <tr>
      <th scope="col">Departamento</th>
      <th scope="col">Ciudad</th>
      <th scope="col">Vereda</th>
      <th scope="col">Calle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?=$departamento?></td>
      <td><?=$ciudad?></td>
      <td><?=$vereda?></td>
      <td><?=$calle?></td>
    </tr>
  </tbody>
</table>
       </div>
       <div class="col-sm">
           <p><br><br></p>
           <div class="text-center">
           <a href = "<?=Base_url('categorias')?>"class="btn" style="background-color: #36907A" > <b style="color:  #FDFEFE"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"  style="color: #FDFEFE "fill="currentColor" class="bi bi-emoji-laughing" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M12.331 9.5a1 1 0 0 1 0 1A4.998 4.998 0 0 1 8 13a4.998 4.998 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5zM7 6.5c0 .828-.448 0-1 0s-1 .828-1 0S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 0-1 0s-1 .828-1 0S9.448 5 10 5s1 .672 1 1.5z"/>
</svg> Quiero ir  </b>  </a>

           </div>
       </div>
   

   </div>

    <?php

  


?>

<?=$pie?>