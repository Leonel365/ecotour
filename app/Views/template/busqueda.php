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
     <img src="<?=base_url()?>/fotografias/<?=$foto?>" class="card-img-top"  height="150" width="235" alt="portada del libro">
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