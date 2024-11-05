<?php 
namespace App\Controllers;
use App\Models\AdminModel;
use App\Controllers\Home;

class Logout extends BaseController
{
  public function logout()
  {
      // Clear session data
      session()->destroy();
      //redirect to the login page
      return redirect()->to(base_url('/login'));
  }
}
?>