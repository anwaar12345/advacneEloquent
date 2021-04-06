<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Comment extends Model
{
    protected $fillable = ['content','rating','user_id'];
    protected static function booted()
    {
        static::addGlobalScope('rating',function($builder){
            $builder->where('rating','>','2');
        });
    }
    public function scopeRating($query,$val)
    {
       $query->where('rating','>',$val);
    }
}
