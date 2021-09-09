<?=$cabecera?>
<?php 
use App\Models\turista;
session_start();

  $correo = $_SESSION['usuario'];

$db = \Config\Database::connect();

$sql = "SELECT idProveedores FROM proveedores WHERE  usuario =  '$correo'"; 
$query = $db->query($sql);
$results = $query->getResultArray();
foreach($results as $row ){
    $id_proveedor=$row['idProveedores'];   
}


$sql = "SELECT plan_turistico.idPlan_Turistico, idLugar_Turistico FROM plan_turistico , notificaciones  WHERE idProveedores = $id_proveedor and notificaciones.idPlan_Turistico = plan_turistico.idPlan_Turistico  "; 


 $query = $db->query($sql);
 $results = $query->getResultArray();

 $cont = 1;
 $sw1 = 0;
 $sw2= 1;
 foreach ($results as $row)
     {

     $id_plan = $row['idPlan_Turistico'];
     $id_lugar = $row['idLugar_Turistico'];
     
     $sql3 = "SELECT fecha_ida, idTurista, presupuesto FROM notificaciones WHERE idPlan_Turistico =  $id_plan";
     $query = $db->query($sql3);
     $resultado = $query->getResultArray();
     foreach ($resultado as $row)
     {
     $fecha = $row['fecha_ida'];
     $presupuesto = $row['presupuesto'];
     $id_turista = $row['idTurista'];
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
   <a href="<?=Base_url('lugar_e/'.$id_lugar)?>"><img src="<?=base_url()?>/fotografias/<?=$foto?>" class="card-img-top"  height="150" width="235" alt="portada del libro"></a>
         <div class="card-body">
      <?php   echo "<p style = 'text-align: justify'>".substr($descripcion, 0, 100)."...</p>"; ?>
      <?php   echo "<p style = 'text-align: justify'><b>Fecha de viaje:</b> ".$fecha."</p>"; ?>
      <?php   echo "<p style = 'text-align: justify'><b>Presupuesto planeado:</b>  ".$presupuesto."</p>"; ?>
      <div class="text-center">
      <a  href="<?=base_url('ir');?>" class="btn btn-success" style="color:white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
        </svg></a>
      <a  href="<?=base_url('ir');?>" class="btn btn-danger" style="color:white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-excel-fill" viewBox="0 0 16 16">
        <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5.884 4.68 8 7.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 8l2.233 2.68a.5.5 0 0 1-.768.64L8 8.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 8 5.116 5.32a.5.5 0 1 1 .768-.64z"/>
        </svg></a>
      
   
    </div>
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