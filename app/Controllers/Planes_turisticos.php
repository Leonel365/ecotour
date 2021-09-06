<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\plan_turistico;

class Planes_turisticos extends Controller{
    
    public function Guardar_plan(){
        session_start();
        $db = \Config\Database::connect();
        $usuario = $_SESSION['usuario'];


        $sql = "SELECT idProveedores FROM proveedores WHERE usuario = '$usuario'";
		$query = $db->query($sql);
		$results = $query->getResultArray();

foreach ($results as $row)
{
	$id = $row['idProveedores'];
   
}
        $nombre_lugar= $this->request->getVar('nombre');
        $precio= $this->request->getVar('precio');
        $descripcion= $this->request->getVar('descripcion');
        $departamento= $this->request->getVar('departamento');
        $ciudad= $this->request->getVar('ciudad');
        $vereda= $this->request->getVar('vereda');
        $calle = $this->request->getVar('calle');
        $categoria = $this->request->getVar('categoria');


        $validation = $this->validate([
            'nombre' => 'required|min_length[1]',
            'precio' => 'required|min_length[1]',
            'descripcion' => 'required|min_length[1]',
            'departamento' => 'required|min_length[1]',
            'ciudad' => 'required|min_length[1]',
            'vereda' => 'required|min_length[1]',
            'calle' => 'required|min_length[1]',
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,1024]',
                
            ]
        ]);
       
        if(!$validation){
            $session = session();
            $session->setFlashdata('mensaje','ERROR');
            return redirect()->back()->withInput();
         
        }else{
        
        
            $imagen=$this->request->getFile('imagen');
            $nuevoNombre= $imagen->getRandomName();
            $imagen->move('../public/fotografias/',$nuevoNombre);
         
       
               
           $sql = "INSERT INTO lugar_turistico(nombre, descripcion, categoria) VALUES ('$nombre_lugar','$descripcion', '$categoria')";
           $query = $db->query($sql);
          
           $sql = "SELECT MAX(idLugar_Turistico) AS id FROM lugar_turistico";
           $query = $db->query($sql);
           $results = $query->getResultArray();
           foreach ($results as $row)
           {
               $id_lugar = $row['id'];
              
           }
           $sql = "INSERT INTO plan_turistico(idProveedores, idLugar_Turistico, precio) VALUES ('$id', '$id_lugar','$precio')";
           $query = $db->query($sql);
        
          
          $sql = " INSERT INTO dirreccion_lugar(idLugar_Turistico, ciudad, departamento, vereda, calle) VALUES ('$id_lugar','$ciudad','$departamento','$vereda','$calle')";
          $query = $db->query($sql);
         
          
          $sql = " INSERT INTO catalogo_lugares(idLugar_Turistico, fotografia) VALUES ('$id_lugar','$nuevoNombre')";
          $query = $db->query($sql);

          return $this->response->redirect(Base_url('catalogo'));
           
         }   
         


    }
}