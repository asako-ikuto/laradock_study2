<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = [
        'user_id', 'title', 'content',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
