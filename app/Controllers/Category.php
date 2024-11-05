<?php 
namespace App\Controllers;
use App\Models\categoryModel;

use App\Controllers\Home;

class Category extends BaseController
{
   //Category operation
    //View Category
    public function goCategory(): string
    {
        $category = new categoryModel();
        $data['category'] = $category->findAll();
        return view('Category',$data);
    }
    //Create Category
    public function add_Cat()
    {
        $category = new categoryModel();
        $data = [
            'parking_area_no'=>$this->request->getPost('parking_area_no'),
            'vehicle_type'=>$this->request->getPost('vehicle_type'),
            'vehicle_limit'=>$this->request->getPost('vehicle_limit'),
            'parking_charge'=>$this->request->getPost('parking_charge')
        ];
        $category->save($data);
        $session = session();
        $session->setFlashdata('add_cat', 'Category added successfully.');
        return redirect()->to('Category');
    }
    //Delete Category
    public function delete_Cat($id)
    {
        $category = new categoryModel();
        $category->delete($id);
        $session = session();
        $session->setFlashdata('delete_cat', 'Category deleted successfully.');
        return redirect()->to('Category');
    }
    //Edit Category Redirect to
    public function edit_Cat($id)
    {
        $category = new categoryModel();
        $data['category'] = $category->find($id);
        return view('Edit_category',$data);
    }
    //Update Category
    public function update_Cat($id)
    {
        $category = new categoryModel();
        $data = [
            'parking_area_no'=>$this->request->getPost('parking_area_no'),
            'vehicle_type'=>$this->request->getPost('vehicle_type'),
            'vehicle_limit'=>$this->request->getPost('vehicle_limit'),
            'parking_charge'=>$this->request->getPost('parking_charge')
        ];
        $category->update($id,$data);
        $session = session();
        $session->setFlashdata('update_cat', 'Category updated successfully.');
        return redirect()->to('Category');
    }
    //Disponibilité des parking
    public function status_active($id)
    {
        $category = new categoryModel();
        $category->update($id,['status'=>'1']);
        return redirect()->to('Category');
    }
    public function status_deactive($id)
    {
        $category = new categoryModel();
        $category->update($id,['status'=>'0']);
        return redirect()->to('Category');
    }

}
?>