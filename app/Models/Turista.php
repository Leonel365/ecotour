<?php 
namespace App\Models;

use CodeIgniter\Model;

class Turista extends Model{
    protected $table      = 'turista';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'idTurista';
     protected $allowedFields = ['primer_nombe','segundo_nombre','segundo_apellido','primer_Apellido','telefono','email','usuario','cotrasena','fotografia'];
}