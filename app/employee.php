<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class employee extends Model
{

   // use SoftDeletes;


    //protected $dates = ['deleted_at'];
    protected $primaryKey = "employee_id";

    protected function setPrimaryKey($key)
    {
    $this->primaryKey = $key;
    }


    public function user(){
        $this->setPrimaryKey("employee_user_id");
        return $this->hasOne('App\user', 'id');
        
    }

    public function projects(){

        $this->setPrimaryKey("employee_id");
        return $this->hasMany('App\project_team', 'project_employee_user_id');
        
    }

    public function isAssigned(){
        $this->setPrimaryKey("employee_id");
        return $this->hasMany('App\project_team', 'project_employee_user_id');
        
    }

    protected $dates = ['deleted_at'];

   

}
