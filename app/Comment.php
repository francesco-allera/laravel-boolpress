<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id', 'first_name', 'last_name', 'comment'
    ];

    public function post() {
        return $this->belongsTo(Post::class);
    }
}
