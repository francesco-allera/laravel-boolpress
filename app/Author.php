<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['email'];

    public function detail() {
        return $this->hasOne(AuthorDetail::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
