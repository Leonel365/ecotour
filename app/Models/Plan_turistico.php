<?php 
namespace App\Models;

use CodeIgniter\Model;

class Plan_turistico extends Model{
    protected $table      = 'plan_turistico';
    // Uncomment below if you want add primary key
     protected $primaryKey = 'idLugar_Turistico';
     protected $allowedFields = ['nombre','descripcion'];
}