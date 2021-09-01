<?php 
namespace App\Models;

use CodeIgniter\Model;

class Catalogo_lugares extends Model{
    protected $table      = 'catalogo_lugares';
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    protected $allowedFields = ['idLugar_Turistico','fotografia'];
}