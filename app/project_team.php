<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project_team extends Model
{
    protected $primaryKey = "team_id";

    protected function setPrimaryKey($key)
    {
        $this->primaryKey = $key;
    }

    public function projects(){
        $this->setPrimaryKey('project_employee_user_id');
        return $this->belongsTo('App\project', 'project_id');
    }

    
}
