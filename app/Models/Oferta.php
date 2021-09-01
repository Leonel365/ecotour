<?php 
namespace App\Models;

use CodeIgniter\Model;

class Oferta extends Model{
    protected $table      = 'oferta';
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
    protected $allowedFields = ['idPlan_Turistico','idLugar_Turistico'];
}