<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = [
        'author_id', 'title', 'text', 'picture'
    ];

    public function getCreatedAtAttribute($value) {
        $date = new Carbon($value);
        return $date->format('d F Y');
    }

    public function author() {
        return $this->belongsTo(Author::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
