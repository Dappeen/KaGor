<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'description', 'user_id', 'statuses_id'];

    public function status()
    {
      return $this->belongsTo('App\Statuse', 'statuses_id');
    }

    public function image()
    {
      return $this->hasMany('App\Photo');
    }

    public function comments()
    {
      return $this->hasMany('App\Comment');
    }
}
