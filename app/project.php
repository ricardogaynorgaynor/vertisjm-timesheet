<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $primaryKey = "project_id";

    protected function setPrimaryKey($key)
    {
    $this->primaryKey = $key;
    }


    public function manager(){

        return $this->hasMany('App\manager', 'manager_user_id');

    }

    public function client(){

        return $this->belongsTo('App\client', 'client_id');

    }

    public function clientInfo(){
        $this->setPrimaryKey('project_client_id');
        return $this->hasOne('App\client', 'client_id');

    }

    public function clientProject(){
        $this->setPrimaryKey('project_client_id');
        return $this->belongsTo('App\client', 'client_id');

    }


    public function projectTask(){
        return $this->hasMany('App\task', 'task_id');
    }


    

  

}
