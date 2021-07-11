<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reservation;
use App\User;
class Company extends Model
{
    public function reservations()
    {
        return $this->hasManyThrough('App\Reservation','App\User','company_id','user_id','id','id');
    }
}
