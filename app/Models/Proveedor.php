<?php 
namespace App\Models;

use CodeIgniter\Model;

class Proveedor extends Model{
    protected $table      = 'proveedores';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'idProveedores';
     protected $allowedFields = ['razon_social','telefono','email','usuario','contrasena','fotografia','tipo'];

}
