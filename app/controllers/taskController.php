<?php
namespace App\Controllers;
use App\Models\Auth;
use App\Models\User;
use App\Models\Task;

class TaskController 
{
    public function index($id){


        if($_SERVER['REQUEST_METHOD'] =='POST'){
            $auth = new Auth();
            $auth->authenticationApiKey();
            $data = json_decode(file_get_contents("php://input"), true);

        
            $api_key = $auth->user_id;
            $task = new Task();
            $task->insert($data);
            echo json_encode(["message" => "task created"]);
            exit;
        }
        if($_SERVER['REQUEST_METHOD'] =='GET'){


            $auth = new Auth();
            $auth->authenticationApiKey();

        
            $user_id = $auth->user_id;
            $task = new Task();
           $user_task = $task->where(['user_id'=>$user_id]);
            show($user_task);
       }
       

       if($_SERVER['REQUEST_METHOD'] =='PATCH'){


        $auth = new Auth();
        $auth->authenticationApiKey();

        $data = json_decode(file_get_contents("php://input"), true);

        $user_id = $auth->user_id;
        $task = new Task();
       $user_task = $task->update($user_id,$data);
       echo json_encode(["message" => "task updated"]);
       exit;
   }
        
    }
}


