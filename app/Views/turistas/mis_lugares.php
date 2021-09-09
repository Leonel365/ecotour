<?=$cabecera?>
<?php 
use App\Models\turista;
session_start();

  $correo = $_SESSION['usuario'];

$db = \Config\Database::connect();


 $query = $db->query($sql);
 $results = $query->getResultArray();

 $cont = 1;
 $sw1 = 0;
 $sw2= 1;
 foreach ($results as $row)
     {

     $id_plan = $row['idPlan_Turistico'];
     $fecha = $row['fecha_ida'];
     $presupuesto = $row['presupuesto'];
     
     $sql3 = "SELECT idLugar_Turistico FROM plan_turistico WHERE idLugar_Turistico = $id_plan";
     $query = $db->query($sql3);
     $resultado = $query->getResultArray();
     foreach ($resultado as $row)
     {
     $id_lugar = $row['idLugar_Turistico'];
     }

     $sql3 = "SELECT idLugar_Turistico, nombre, descripcion FROM lugar_turistico WHERE  idLugar_Turistico = $id_lugar";
     $query = $db->query($sql3);
     $resultado = $query->getResultArray();
     foreach ($resultado as $row)
     {
        $nombre = $row['nombre'];
        $descripcion = $row['descripcion'];
     }

     $sql3 = "SELECT fotografia FROM catalogo_lugares WHERE idLugar_Turistico = $id_lugar";
     $query = $db->query($sql3);
     $resultado = $query->getResultArray();
     foreach ($resultado as $row)
     {
     $foto = $row['fotografia'];
     }
     echo  "<br>";
     if($sw1 == 0){
         echo  "<div class='row'>";
         $sw1 = 1;
     }
   
     echo "<div class='col-3'>";
   
     ?>
     <div class="card" style="width: 18rem;">
   <?php  echo "<p style = 'text-align: center'><b>$nombre</b></p>"; ?>
   <a href="<?=Base_url('lugar_t/'.$id_lugar)?>"><img src="<?=base_url()?>/fotografias/<?=$foto?>" class="card-img-top"  height="150" width="235" alt="portada del libro"></a>
         <div class="card-body">
      <?php   echo "<p style = 'text-align: justify'>".substr($descripcion, 0, 100)."...</p>"; ?>
      <?php   echo "<p style = 'text-align: justify'><b>Fecha de viaje:</b> ".$fecha."</p>"; ?>
      <?php   echo "<p style = 'text-align: justify'><b>Presupuesto planeado:</b>  ".$presupuesto."</p>"; ?>
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