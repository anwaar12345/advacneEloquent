<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;
class Room extends Model
{
    // protected $table = 'my_rooms';if we have own naming convention for database
    // protected $primaryKey = 'mycumstom_key';
    // protected $connection = 'database.sqlite' // specifying connection for modal
    // public $timestamps = false; // if we don't want created_at and deleted_at column
    
    public function cities()
    {
       return $this->belongsToMany('App\City','city_room','room_id','city_id')
       ->withPivot('created_at','updated_at')
       ->as('city_room');
    }
}
