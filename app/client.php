<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $primaryKey = "client_id";

    protected function setPrimaryKey($key)
    {
        $this->primaryKey = $key;
    }
    
    public function address(){
        return $this->hasOne('App\address', 'address_user_id');
    }

    public function projects(){
        return $this->hasMany('App\project', 'project_client_id');
    }

}
