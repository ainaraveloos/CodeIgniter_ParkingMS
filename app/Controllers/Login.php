<?php 
namespace App\Controllers;
use App\Models\AdminModel;
use App\Controllers\Home;

class Login extends BaseController
{
    public function redirectLogin()
    {
        helper(['form']);
        return view('admin/Login');
    } 
  public function loginAuth()
  {
      $session = session();
      $userModel = new adminModel();
      $username = $this->request->getVar('username');
      $password = $this->request->getVar('password');
      
      $data = $userModel->where('username', $username)->first();
      
      if($data){
          $pass = $data['password'];
          $authenticatePassword = password_verify($password, $pass);
          if($authenticatePassword){
              $ses_data = [
                  'id' => $data['id'],
                  'username' => $data['username'],
                  'email' => $data['email'],
                  'IsLoggedIn' => TRUE
              ];
              $session->set($ses_data);
              return redirect()->to('/Dashboard');
          
          }else{
              $session->setFlashdata('msg', 'Password is incorrect.');
              return redirect()->to('/login');
          }
      }else{
          $session->setFlashdata('msg', 'Username does not exist.');
          return redirect()->to('/login');
      }
  }
}
?>