<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
