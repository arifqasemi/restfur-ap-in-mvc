<?php
namespace App\Models;
use App\Core\Model;



class User extends Model
{
  public $allowedColumn =['name','email','password'];


    public $order ="asc";

    public $table ="user";
}