<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Room;
class City extends Model
{
    public function rooms()
    {
       return $this->belongsToMany('App\Room','city_room','city_id','room_id')
                    ->withPivot('created_at','updated_at')
                    ->as('city_room');
    }
    public function image()
    {
        return $this->morphOne('App\Image','imageable');
    }
}
