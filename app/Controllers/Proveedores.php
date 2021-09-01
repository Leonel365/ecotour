<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\proveedor;
class Proveedores extends Controller{

    public function guardar_empresas(){

        $proveedor = new Proveedor();

        $razon_social= $this->request->getVar('razon_social');
        $email= $this->request->getVar('email');
        $telefono= $this->request->getVar('telefono');
        $tipo= $this->request->getVar('tipo');
        $contrasena= sha1($this->request->getVar('contrasena'));

        $validation = $this->validate([
            'razon_social' => 'required|min_length[1]',
            'email' => 'required|min_length[1]',
            'telefono' => 'required|min_length[1]',
            
        ]);
        $img = $this->validate([
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
          //  return $this->response->redirect(site_url('/listar'));  
        }else{
        
        if($img){
            $imagen=$this->request->getFile('imagen');
            $nuevoNombre= $imagen->getRandomName();
            $imagen->move('../public/fotografias/',$nuevoNombre);
        }else{
            $nuevoNombre= "empresa.png";
        }
            $datos=[
                'razon_social'=>$razon_social,
                'telefono'=>$telefono,
                'email'=>$email,
                'usuario'=>$email,
                'contrasena'=>$contrasena,
                'fotografia'=>$nuevoNombre,
                'tipo'=>$tipo
            ];


           $proveedor->insert($datos);
         }   
         
    
      return $this->response->redirect(Base_url('/login/2'));  

    }
}