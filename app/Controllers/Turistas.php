<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\turista;
class Turistas extends Controller{


    public function guardar_turistas(){

        $turista = new Turista();

        $p_nombre= $this->request->getVar('p_nombre');
        $s_nombre= $this->request->getVar('s_nombre');
        $p_apellido= $this->request->getVar('p_apellido');
        $s_apellido= $this->request->getVar('s_apellido');
        $email= $this->request->getVar('email');
        $telefono= $this->request->getVar('telefono');
        $contrasena= sha1($this->request->getVar('contrasena'));

        $validation = $this->validate([
            'p_nombre' => 'required|min_length[1]',
            'p_apellido' => 'required|min_length[1]',
            's_apellido' => 'required|min_length[1]',
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
            $nuevoNombre= "turista.png";
        }
            $datos=[
                'primer_nombe'=>$p_nombre,
                'segundo_nombre'=>$s_nombre,
                'segundo_apellido'=>$s_apellido,
                'primer_Apellido'=>$p_apellido,
                'telefono'=>$telefono,
                'email'=>$email,
                'usuario'=>$email,
                'cotrasena'=>$contrasena,
                'fotografia'=>$nuevoNombre
            ];

           $turista->insert($datos);
         }   
         
    
      return $this->response->redirect(site_url('login/1'));  

    }

}