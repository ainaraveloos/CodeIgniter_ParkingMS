<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\AdminModel;
use App\Models\VehicleModel;
use App\Models\categoryModel;


class Home extends Controller
{
    public function index()
    {
        $session = session();
        if (!$session->get('IsLoggedIn')) {
            return redirect()->to('/login');
        }
        //echo "Hello : ".$session->get('name');
        $vehicle = new vehicleModel();
        $category = new categoryModel();
        $vehicle_parked = $vehicle->where('status','0')->countAllResults();
        $vehicule_departed = $vehicle->where('status','1')->countAllResults();
        $category_available = $category->countAllResults();
        $all_earings = $vehicle->getTotalEarings();
        $all_records = $vehicle->countAllResults();
        $data = 
        [
            'vehicle_parked'=>$vehicle_parked,
            'vehicle_departed'=>$vehicule_departed,
            'category_available'=>$category_available,
            'all_earings'=>$all_earings,
            'all_records'=>$all_records
        ];
        
        return view('Dashboard',$data);
    }
}