<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Address extends Model
{
    protected $fillable = ['number','street','country','user_id'];  
    public function users()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
