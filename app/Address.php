<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Address extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
