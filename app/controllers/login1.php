<?php
namespace App\Controllers;

use App\Core\Database;
use App\Core\Controller;
use App\Models\User;
use App\Models\Auth;
use App\Core\Jwt;

class Login1 extends Controller
{
    public function index(){
       $db = new Database();
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
      

            $data = json_decode(file_get_contents("php://input"), true);
 
    
            if (  array_key_exists("email", $data) ||
                  array_key_exists("password", $data)) {
                     $user = new User();
                     $user = $user->first(['email'=> $data['email']]);
                     if(!$user == null){
                        
                    
                  if($user->password == $data['password']){
                     $payload = [ "id" => $user->id,"name" => $user->name,"exp"=> time() + 4000];
                     $expiry =432000;
                      $refresh =["id" => $user->id,"exp" => time() + 432000];

                     // $auth = new Auth();
                     // $auth->authenticate($user);
                        //   show($user->password);
                        //   return;
                     $jwt = new Jwt();
                    $access_token = $jwt->encode($payload);
                    $refresh_token = $jwt->encode($refresh);
                    echo json_encode(["access_token" => $access_token,"refresh_token" => $refresh_token]);
                    return;
                  }else{
                        echo json_encode(["message" => "invalid authentication"]);
                        http_response_code(401);
                         $this->errors['password']="the password is invalid";
                        return;
                  }
             
            }else{
                   echo json_encode(["message" => "wrong email"]);
                   http_response_code(401);

                   $this->errors['password']="the password is invalid";

                 return;
            }
          }

         

    }


       $this->view('login');
    }





    public function accessToken(){

      if ($_SERVER["REQUEST_METHOD"] == "POST") {

         $codec = new Jwt();
         $auth = new Auth($codec);
        $access_token1 = $auth->authenticateAccessToken();
      // $header = apache_request_headers();
     show($access_token1);
    }
   }
}