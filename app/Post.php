<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function sektors()
    {
        return $this->belongsToMany('App\Sektor');
    }
    public function comments()
    {
        return $this->morphMany('App\Comment','commentable');
    }
    public function member()
    {
        return $this->belongsTo('App\Member');
    }
}
