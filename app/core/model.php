<?php
namespace App\Core;
use App\Core\Database;



class Model extends Database
{

public function insert($data){

  if($this->allowedColumn){
    foreach($data as $key => $value){
        if(!in_array($key,$this->allowedColumn)){
            unset($data[$key]);
        }
    }
  }

    $key =array_keys($data);
    $query = "insert into " .$this->table. "(".implode(',',$key).") values(:".implode(",:",$key).")";
    // show($query);
    // return;
    $this->query($query,$data);
}



public function update($id,$data){


    $query ="update ".$this->table. " set ";
    if($this->allowedColumn){
        foreach($data as $key =>$value){
            if(!in_array($key,$this->allowedColumn)){
                unset($data[$key]);
            }
        }
    }

    foreach($data as $key =>$value){
        $query .= $key ."=:" . $key . ","; 
    }
    $query = trim($query,",");
    $query .= " where id = :id ";
    $data['id']=$id;
    // show($query);
    // return;
    $this->query($query,$data);

}




public function where($data){
    $query ="select * from ".$this->table." where ";

    foreach($data as $key => $value){
        $query .= $key."=:".$key. " && ";
    }

    $query = trim($query,"&& ");
    // show($query);
    // return;
   $res = $this->query($query,$data);

   return $res;
    
}



public function delete(int $id)
	{

		$query = "delete from ".$this->table." where id = :id limit 1";
		$this->query($query,['id'=>$id]);

		return true;

	}



public function findAll(){

    $query ="select * from ".$this->table;
   

    $res = $this->query($query);
    return $res;
    
}


public function first($data){

    $query ="select * from ".$this->table." where ";
    foreach($data as $key =>$value){
        $query .= $key."=:".$key. " && ";
    }
    $query = trim($query,"&& ");
    $query .= " order by id $this->order limit 1";

    $res = $this->query($query,$data);
    if(is_array($res))
		{
    return $res[0];
        }
}

}