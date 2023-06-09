<?php
namespace App\Controllers;
use App\Models\Auth;
use App\Models\User;
use App\Models\Task;
use App\Core\Jwt;

class TaskController 
{
    public function index($id){


        if($_SERVER['REQUEST_METHOD'] =='POST'){
            $data = json_decode(file_get_contents("php://input"), true);

            $codec = new Jwt();
            $auth = new Auth($codec);
           $access_token1 = $auth->authenticateAccessToken();

        // show("this is wierd");
        // return;
            $user_id = $auth->user_id;
            $data['user_id']=$user_id;
            $task = new Task();
            $task->insert($data);
            echo json_encode(["message" => "task created"]);
            exit;
        }
        if($_SERVER['REQUEST_METHOD'] =='GET'){

            $codec = new Jwt();
            $auth = new Auth($codec);
           $access_token1 = $auth->authenticateAccessToken();

        // show("this is wierd");
        // return;
            $user_id = $auth->user_id;
            $task = new Task();
           $user_task = $task->where(['user_id'=>$user_id]);
            show($user_task);
       }
       

       if($_SERVER['REQUEST_METHOD'] =='PATCH'){


       

        $data = json_decode(file_get_contents("php://input"), true);

        $task = new Task();
       $user_task = $task->update($id,$data);
       echo json_encode(["message" => "task updated"]);
       exit;
   }
        



     if($_SERVER['REQUEST_METHOD'] =='DELETE'){


        //     $codec = new Jwt();
        //     $auth = new Auth($codec);
        //    $access_token1 = $auth->authenticateAccessToken();

        //     $data = json_decode(file_get_contents("php://input"), true);

        //     $user_id = $auth->user_id;
            $task = new Task();
            $task->delete($id);
        echo json_encode(["message" => "task deleted"]);
        exit;
        }




        // $this->view('home');
    }
    
}


