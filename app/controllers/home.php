<?php

namespace App\Controllers;

use App\Core\Database;
use App\Core\Controller;
use App\Models\User;
class Home extends Controller
{
    public function index(){
        // if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //     $user = new User();
       
        //     $user->insert($_POST);
        // }









        $this->view('home');

    }
}