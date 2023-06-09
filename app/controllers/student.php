<?php
namespace App\Controllers;

use App\Core\Database;
use App\Core\Controller;
use App\Models\Student as StudentModel;
use App\Core\Jwt;
use App\Models\Auth;

class Student extends Controller
{


    public function index(){
        $data = [];
        
            $students = new StudentModel();
          $data= $students->findAll();
    
        
         $data['rows']=$data;
        $this->view('students',$data);
    }



    public function add_student(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $data = json_decode(file_get_contents("php://input"), true);

            $codec = new Jwt();
            $auth = new Auth($codec);
            $auth->authenticateAccessToken();

        // show("this is wierd");
        // return;
            $user_id = $auth->user_id;
      

            if (  array_key_exists("email", $data) ||
            array_key_exists("fname", $data)) {
                  $student = new StudentModel();
                  $data['teacher_id']=$user_id;

                  $student->insert($data);
                  echo json_encode(["message" => "student has been add successfully"]);
                  http_response_code(200);
             return;
            }else{
                echo json_encode(["message" => "the student has not been added"]);
                http_response_code(401);
                return;
            }
      
 

        
         
           
        }
        $this->view('add_student');
    }



  
    public function edit_student($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "PATCH") {

            $data = json_decode(file_get_contents("php://input"), true);

            $codec = new Jwt();
            $auth = new Auth($codec);
             if($access_token =  $auth->authenticateAccessToken()){;

               if(!$data['email'] ==""){

                  $student = new StudentModel();

                  $student->update($data['id'],$data);
                  echo json_encode(["message" => "the student has been updated successfully"]);
                  http_response_code(200);
             return;
            }else{
                echo json_encode(["message" => "please fill the email"]);
                http_response_code(401);
                return;
            }
      
        }else{
            echo json_encode(["message" => "invalid token"]);
            http_response_code(401);
            return;

        }

        
         
           
        }

        $students = new StudentModel();
        $data['student']= $students->first(['id'=>$id]);
        $this->view('edit_student',$data);
    }



    public function delete_student()
    {
        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {

            $data = json_decode(file_get_contents("php://input"), true);

            $codec = new Jwt();
            $auth = new Auth($codec);
             if($access_token =  $auth->authenticateAccessToken()){

               if(!$data['id'] ==""){

                  $student = new StudentModel();

                  $student->delete($data['id']);
                  echo json_encode(["message" => "the student has been deleted successfully"]);
                  http_response_code(200);
             return;
            }else{
                echo json_encode(["message" => "please fill the email"]);
                http_response_code(401);
                return;
            }
        }
        }
    }
}