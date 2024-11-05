<?php 
namespace App\Controllers;
use App\Models\vehicleModel;
use App\Models\categoryModel;
use App\Controllers\Home;

class Vehicle extends BaseController
{
//Vehicle operation
public function goAddvehicle(): string
{
    $categoryModel = new categoryModel();
    $vehicle = new vehicleModel();
    $categories = $categoryModel->findAll();
    $vehicles= $vehicle->findAll();
    $vehicleData = [];
    foreach ($categories as $category) 
    {
        $vehicle_type = $category['vehicle_type'];
        $vehicle_limit = $category['vehicle_limit'];
        $parking_area_no = $category['parking_area_no'];
        $parking_charge = $category['parking_charge'];
        // Récupérer le nombre de véhicules stationnés (status = 0) pour ce type de véhicule
        $parkedCount = $vehicle
            ->where('vehicle_type', $vehicle_type)
            ->where('status', '0') // Véhicules stationnés
            ->countAllResults();
        //Controller automatiquement le status de disponiblilité du parking par categories
        // Comparer avec la capacité maximale de la catégorie avec le nombre de vehicules garés
        if ($parkedCount >= $category['vehicle_limit']) {
            // Mettre à jour le statut de la catégorie à '1'
            $categoryModel->update($category['cat_id'], ['status' => '1']);
        } else {
            // Si la capacité n'est pas atteinte, marquer comme '0'
            $categoryModel->update($category['cat_id'], ['status' => '0']);
        }

         // Calculer les places disponibles restantes
        $availableSpots = $vehicle_limit - $parkedCount;
         // Préparer le résultat pour ce type de véhicule
        $vehicleData[] = [
            'vehicle_type' => $vehicle_type,
            'vehicle_limit' => $vehicle_limit,
            'parked_vehicles' => $parkedCount,
            'available_spots' => $availableSpots,
            'parking_area_no'=>$parking_area_no,
            'parking_charge'=>$parking_charge,
            'vehicle'=>$vehicles,
        ];
    
    }    
    return view('Add_vehicle',['vehicleData' => $vehicleData]);
}
//Add vehicle
public function addVehicle()
{
    $vehicle = new vehicleModel();
    $data = [
        'vehicle_no'=>$this->request->getPost('vehicle_number'),
        'vehicle_type'=>$this->request->getPost('vehicle_type'),
        'parking_area_no'=>$this->request->getPost('parking_area_no'),
        'parking_charge'=>$this->request->getPost('parking_charge')
    ];
    $vehicle->save($data);
    session()->setFlashdata('add_vehicle', 'Vehicle added successfully.');
    return redirect()->to('Add_vehicle');
}

public function unparked($id)
{
    $vehicle = new vehicleModel();
    $vehicle->update($id,['status'=>'1']);
    return redirect()->to('Manage_vehicle');
}
public function parked($id)
{
    $vehicle = new vehicleModel();
    $vehicle->update($id,['status'=>'0']);
    return redirect()->to('Manage_vehicle');
}

public function goManagevehicle(): string
{
   $vehicle = new vehicleModel();
     // Configure la pagination
     $perPage = 8; // Nombre de résultats par page
     $currentPage = $this->request->getVar('page') ?? 1;

     $vehicles = $vehicle->paginate($perPage, 'vehicle');
     $pager = $vehicle->pager;

     return view('Manage_vehicle', [
         'vehicles' => $vehicles,
         'pager' => $pager,
         'currentPage' => $currentPage,
     ]);

}
public function receipt($id)
{
    $vehicle = new vehicleModel();
    $data= $vehicle->find($id);
    return view('Receipt',['receipt'=>$data]);
}

}
?>