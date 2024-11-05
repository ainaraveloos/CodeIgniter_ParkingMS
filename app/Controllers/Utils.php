<?php 
namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\vehicleModel;
use App\Controllers\Home;

class Utils extends BaseController
{
   
    public function goSetting()
    {
        return view('setting');
        
    }
    public function editPassword()
    {
        $id = session()->get('id');// ID de l'admin connecté
        $admin= new AdminModel();
        $data= $admin->find($id);
        $current_password = $this->request->getPost('current_password');
        $reenter_password = $this->request->getPost('reenter_password');

        $validate_pass=password_verify($current_password,$data['password']);
        $rules = 
        [
            'new_password'      => 'required|min_length[4]|max_length[50]',
            'reenter_password'  => 'matches[new_password]'
        ];
        
        if($validate_pass)
        {
            if($this->validate($rules))
            {
                $new_password = $this->request->getPost('new_password');
                $admin->update($id,['password' => password_hash($new_password, PASSWORD_DEFAULT)]);
                session()->setFlashdata('edit_success', 'Password modified with success');
                return redirect()->to('/Dashboard');
            }  
            else 
            {
                $error['validation'] = $this->validator;
                return view('setting',$error);
            }
        
        }
        session()->setFlashdata('wrong_pass', 'Wrong password,please retry');
        return view('setting');
    }
}
    
        
?>