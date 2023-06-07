<?php
namespace App\Models;
use App\Core\Model;



class Task extends Model
{
  public $allowedColumn =['name','user_id','is_completed'];


    public $order ="asc";

    public $table ="task";
}