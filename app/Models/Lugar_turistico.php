<?php 
namespace App\Models;

use CodeIgniter\Model;

class Lugar_turistico extends Model{
    protected $table      = 'lugar_turistico';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'idLugar_Turistico';
     protected $allowedFields = ['nombre','descripcion'];
}