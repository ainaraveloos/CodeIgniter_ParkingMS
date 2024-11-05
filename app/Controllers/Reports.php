<?php 
namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\vehicleModel;

class Reports extends BaseController
{
    public function goReports()
    {
        $vehicleModel = new vehicleModel();

        // Récupérer le nombre de véhicules par catégorie
        $categoryData = $vehicleModel->select('vehicle_type, COUNT(*) as count')
                                      ->groupBy('vehicle_type')
                                      ->findAll();

        $categories = [];
        $vehicleCounts = [];

        foreach ($categoryData as $row) {
            $categories[] = $row['vehicle_type'];
            $vehicleCounts[] = $row['count'];
        }

        // Récupérer le nombre de véhicules par date
        $dateData = $vehicleModel->select('DATE(arrival_time) as date, COUNT(*) as count')
                                  ->groupBy('DATE(arrival_time)')
                                  ->orderBy('DATE(arrival_time)', 'ASC') // Trier par date croissante
                                  ->findAll();

        $dates = [];
        $vehiclesByDate = [];

        foreach ($dateData as $row) {
            $dates[] = $row['date'];
            $vehiclesByDate[] = $row['count'];
        }

        // Récupérer les revenus par date
        $revenueData = $vehicleModel->select('DATE(arrival_time) as date, SUM(parking_charge) as revenue')
                                     ->groupBy('DATE(arrival_time)')
                                     ->orderBy('DATE(arrival_time)', 'ASC') // Trier par date croissante
                                     ->findAll();

        $revenuesByDate = [];

        foreach ($revenueData as $row) {
            $revenuesByDate[] = $row['revenue'];
        }

        // Passer les données à la vue
        return view('Reports', [
            'categories' => $categories,
            'vehicleCounts' => $vehicleCounts,
            'dates' => $dates,
            'vehiclesByDate' => $vehiclesByDate,
            'revenuesByDate' => $revenuesByDate,
        ]);
    }
}
?>