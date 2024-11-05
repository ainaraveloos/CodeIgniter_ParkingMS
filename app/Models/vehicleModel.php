<?php

namespace App\Models;

use CodeIgniter\Model;

class vehicleModel extends Model
{
    protected $table = 'add_vehicle';  // Table des categories
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','vehicle_no','parking_area_no','vehicle_type','parking_charge','status','arrival_time'];
 // Active pagination dans le modèle
    protected $useAutoIncrement = true;
public function getTotalEarings()
{
    return $this->selectSum('parking_charge')->get()->getRow()->parking_charge;
}
public function searchVehicles($search_query, $filters = [])
{
    $builder = $this->table($this->table);

    // Recherche par numéro de véhicule
    if (!empty($search_query)) {
        $builder->like('vehicle_no', $search_query);
    }

    // Filtre par type de véhicule
    if (!empty($filters['vehicle_type'])) {
        $builder->where('vehicle_type', $filters['vehicle_type']);
    }

    // Filtre par date d'arrivée (entre deux dates)
    if (!empty($filters['arrival_time_start']) && !empty($filters['arrival_time_end'])) {
    $start_date = date('Y-m-d H:i:s', strtotime($filters['arrival_time_start']));
    $end_date = date('Y-m-d H:i:s', strtotime($filters['arrival_time_end']));

    $builder->where('arrival_time >=', $start_date)
            ->where('arrival_time <=', $end_date);
    }
    if(!empty($filters['arrival_time_start']) && empty($filters['arrival_time_end']))
    {
    $builder->where('arrival_time >=', $filters['arrival_time_start']);
    }
    if(empty($filters['arrival_time_start']) && !empty($filters['arrival_time_end']))
    {
    $builder->where('arrival_time <=', $filters['arrival_time_end']);
    }

    // Filtre par montant de charge (entre min et max)
    if (!empty($filters['parking_charge_min']) && !empty($filters['parking_charge_max'])) {
        $builder->where('parking_charge >=', $filters['parking_charge_min']);
        $builder->where('parking_charge <=', $filters['parking_charge_max']);
    }
    if(!empty($filters['parking_charge_min']) && empty($filters['parking_charge_max']))
    {
        $builder->where('parking_charge >=', $filters['parking_charge_min']);
    }
    if(empty($filters['parking_charge_min']) && !empty($filters['parking_charge_max']))
    {
        $builder->where('parking_charge <=', $filters['parking_charge_max']);
    }

    // Filtre par statut (0 pour garé, 1 pour parti)
    if (!empty($filters['status']) || $filters['status'] === '0') {
        $builder->where('status', $filters['status']);
    }

    return $builder->get()->getResultArray();
}


    
}
