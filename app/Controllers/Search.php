<?php  
namespace App\Controllers;

use App\Models\categoryModel;
use App\Models\VehicleModel;
use CodeIgniter\Controller;

class Search extends Controller
{
    protected $addVehicleModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->addVehicleModel = new VehicleModel();
        $this->categoryModel = new categoryModel();
    }

    public function filterSearch()
    {
        
    // Récupérer la requête de recherche
    $search_query = $this->request->getGet('search_query');

    // Récupérer les filtres
    $filters = [
        'vehicle_type'       => $this->request->getGet('vehicle_type'),
        'arrival_time_start' => $this->request->getGet('arrival_time_start'),
        'arrival_time_end'   => $this->request->getGet('arrival_time_end'),
        'parking_charge_min' => $this->request->getGet('parking_charge_min'),
        'parking_charge_max' => $this->request->getGet('parking_charge_max'),
        'status'             => $this->request->getGet('status')
    ];

    // Chercher les véhicules dans la base de données
    $vehicles = $this->addVehicleModel->searchVehicles($search_query, $filters);

    // Récupérer les types de véhicules depuis la table category
    $vehicle_types = $this->categoryModel->getVehicleTypes();

    // Passer les résultats et types de véhicules à la vue
    return view('Search', [
        'vehicles'      => $vehicles,
        'vehicle_types' => $vehicle_types
    ]);


    }
    public function deleteVehicle($id)
    {
        $vehicle = new VehicleModel();
        $vehicle->delete($id);
        $session = session();
        $session->setFlashdata('delete_vehicle', 'Vehicle deleted successfully.');
        return redirect()->to('/Search_vehicle');
    }
}
    
    


?>
