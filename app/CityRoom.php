<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CityRoom extends Pivot
{
    public $incrementing = true;
       protected function booted()
       {
          return  static::created(function($cityRoom){
               dump($cityRoom,'saved related model');
           });
       }
}
