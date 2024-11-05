<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\adminModel;
  
class Register extends Controller
{
    public function redirectRegister()
    {
        helper(['form']);
        $data = [];
        echo view('admin/Register', $data);
    }
  
    public function Register()
    {
        helper(['form']);
        $rules = [
            'username'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[admin.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirm_password'  => 'matches[password]'
        ];
          
        if($this->validate($rules)){
            $userModel = new adminModel();
            $data = [
                'username'     => $this->request->getVar('username'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $userModel->save($data);
            session()->setFlashdata('success', 'registration successful, please log in.');
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            echo view('admin/Register', $data);
        }
          
    }
  
}