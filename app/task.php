<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    protected $primaryKey = "task_id";

    protected function setPrimaryKey($key)
    {
        $this->primaryKey = $key;
    }

    public function addedBy(){
        $this->setPrimaryKey('task_employee_id');
        return $this->belongsTo('App\employee', 'employee_id');
    }
}
