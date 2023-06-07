<?php
namespace App\Models;
use App\Core\Model;

class Auth extends Model
{
    public $table ="user";

    public $user_id;



    public function authenticate($data){
        if(is_object($data)){
        $_SESSION['user']=$data;

        }

    }
    public function logout(){
        unset($_SESSION['user']);
        redirect('login');
    }


    public function logged_in(){
        if(!empty($_SESSION['USER_DATA']))
		{
			return true;
		}

		return false;
    }





    public function authenticationApiKey():bool
    {

         if(empty($_SERVER['HTTP_X_API_KEY'])){
            http_response_code(404);
            echo json_encode(["massege"=>"invalid api key"]);
            return false;
         }


        $api_key = $_SERVER['HTTP_X_API_KEY'];
        $user = $this->where(['api_key'=>$api_key]);
        if( $user === false){
            http_response_code(404);
            echo json_encode(["massege"=>"invalid api key"]);
        return false;
        }else{

            $this->user_id = $user[0]->id;
            return true;

        }
    }


    public function getUserId():int
    {
       return $this->user_id;

    }


    public function authenticateAccessToken(): bool
    {
        if ( ! preg_match("/^Bearer\s+(.*)$/", $_SERVER["HTTP_AUTHORIZATION"], $matches)) {
            http_response_code(400);
            echo json_encode(["message" => "incomplete authorization header"]);
            return false;
        }
        
        try {
            $data = $this->codec->decode($matches[1]);
            
        } catch (Exception $e) {
            
            http_response_code(400);
            echo json_encode(["message" => $e->getMessage()]);
            return false;
        }
        
        $this->user_id = $data["id"];
        
        return true;
    }
}