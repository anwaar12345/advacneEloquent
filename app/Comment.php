<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Comment extends Model
{
    protected $casts = [ 'rating' => 'float'];
    protected $fillable = ['content','rating','user_id'];
    // protected static function booted()
    // {
    //     static::addGlobalScope('rating',function($builder){
    //         $builder->where('rating','>','2');
    //     });
    // }
    public function scopeRating($query,$val)
    {
       $query->where('rating','>',$val);
    }
    protected static function booted()
    {
        static::retrieved(function ($comment) {
            echo $comment->rating;
        });
    }

    public function getRatingAttribute($val)  // Accessor example with column name  it takes argument
    {
        return $val+10;
    }
    public function getWhoWhatAttribute() //with out argument accesor example
    {
        return "user {$this->user_id} rates {$this->rating}";
    }

    public function setContentAttribute($val)
    {
         $this->attributes['content'] = strtoupper($val);
    }
    public function setRatingAttribute($val)
    {
         $this->attributes['rating'] = $val + 10;
        
    }
    public function user()
    {
      return $this->belongsTo('App\User','user_id','id');
    }

    public function country()
    {
        return $this->hasOneThrough('App\Address','App\User','id','user_id','user_id','id')
        ->select('name as country');
    }
}
