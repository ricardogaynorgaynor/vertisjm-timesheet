<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $primaryKey = "address_id";
    public function client()
    {
        return $this->belongsTo('App\client', 'client_id');
    }
}
