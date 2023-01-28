<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorDetail extends Model
{
    protected $fillable = [
        'author_id', 'first_name', 'last_name', 'birth', 'bio', 'website'
    ];

    public function author() {
        return $this->belongsTo(Author::class);
    }
}
