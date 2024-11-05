<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';  // Table des utilisateurs admin
    protected $primaryKey = 'id';
    protected $allowedFields = ['username','email', 'password'];

}
