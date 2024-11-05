<?php

namespace App\Models;

use CodeIgniter\Model;

class categoryModel extends Model
{
    protected $table = 'category';  // Table des categories
    protected $primaryKey = 'cat_id';
    protected $allowedFields = ['cat_id', 'parking_area_no','vehicle_type','vehicle_limit','parking_charge','status',];
    public function getVehicleTypes()
    {
        return $this->select('vehicle_type')->distinct()->findAll();
    }
}
