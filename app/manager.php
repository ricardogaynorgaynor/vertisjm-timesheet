<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class manager extends Model
{
    protected $primaryKey = "manager_id";

    public function project(){
        return $this->hasMany('App\project', 'project_created_by_id');
    }
}
