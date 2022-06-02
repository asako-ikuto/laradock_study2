<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title', 'content',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function like_users()
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();;
    }
}
