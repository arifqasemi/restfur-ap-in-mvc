<?php
namespace App\Models;
use App\Core\Model;



class Student extends Model
{
  public $allowedColumn =['fname','lname','gender','email','teacher_id'];

    public $errors =[];
    public $order ="asc";

    public $table ="student";
}