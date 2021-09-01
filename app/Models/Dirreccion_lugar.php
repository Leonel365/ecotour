<?php 
namespace App\Models;

use CodeIgniter\Model;

class Dirreccion_lugar extends Model{
    protected $table      = 'dirreccion_lugar';
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    protected $allowedFields = ['idLugar_Turistico','ciudad','municipio','vereda','calle'];
}