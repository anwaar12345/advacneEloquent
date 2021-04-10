<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Room;
use App\CityRoom;
class City extends Model
{
    public function rooms()
    {
       return $this->belongsToMany('App\Room','city_room','city_id','room_id')
                    ->withPivot('created_at','updated_at')
                    ->as('city_room')
                    ->using('App\CityRoom');
    }
    public function image()
    {
        return $this->morphOne('App\Image','imageable');
    }
}
