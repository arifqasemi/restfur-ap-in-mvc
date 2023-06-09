<?php
namespace App\Models;
use App\Core\Model;



class User extends Model
{
  public $allowedColumn =['name','email','password','api_key'];

    public $errors =[];
    public $order ="asc";

    public $table ="user";
}