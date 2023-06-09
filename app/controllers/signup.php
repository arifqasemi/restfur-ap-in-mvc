<?php

namespace App\Controllers;

use App\Core\Database;
use App\Core\Controller;
use App\Models\User;
class Signup extends Controller
{
    public function index(){
        $data =[];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = new User();
            $api_key = bin2hex(random_bytes(16));
            
            $_POST['api_key']=$api_key;
            $user->insert($_POST);
              message("Thank you for registering. Your API key is ". $api_key ."<br>");
              redirect('login1');
              die;
            
        }









        $this->view('signup',$data);

    }
}