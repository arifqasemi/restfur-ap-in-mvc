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
                  if($user->password == $data['password']){
                     $payload = [ "id" => $user->id,"name" => $user->name,"exp"=> time() + 4000];
                     $expiry =432000;
                      $refresh =["id" => $user->id,"exp" => time() + 432000];

                     $auth = new Auth();
                     $auth->authenticate($user);

                     $jwt = new Jwt();
                    $access_token = $jwt->encode($payload);
                    $refresh_token = $jwt->encode($refresh);
                    echo json_encode(["access_token" => $access_token,"refresh_token" => $refresh_token]);
                     return;
                   
                  }else{
                     http_response_code(401);
                        echo json_encode(["message" => "invalid authentication"]);
                        exit;
                  }
               //   echo json_encode(["message" => "password and email exists"]);
               //   return;
            }
    // $user = $user_gateway->getByUsername($data["username"]);
    
    // if ($user === false) {
        
    //     http_response_code(401);
    //     echo json_encode(["message" => "invalid authentication"]);
    //     exit;
    }
//     $name ='arif qasemi';
//       $user = new User();
//      $user = $user->where(['name'=> $name]);
//   if($user ==null){
//    echo "it is null";
//   }else{
//    show($user);
//   }
    // if ( ! password_verify($data["password"], $user["password_hash"])) {
        
    //     http_response_code(401);
    //     echo json_encode(["message" => "invalid authentication"]);
    //     exit;
    // }
    // $secret_key ="5A7134743777217A25432646294A404E635266556A586E3272357538782F413F";
    // $expiry =432000;
    // require __DIR__ . "/tokens.php";
    
    // $refresh_token_gateway = new RefreshTokenGateway($database,$secret_key);
    // $refresh_token_gateway->create($refresh_token,$expiry);



       $this->view('login');
    }
}