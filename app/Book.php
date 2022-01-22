<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['category_id','title', 'author', 'publisher', 'ISBN', 'description', 'upload'];

    public function category()
    {
        return $this->belongsTo('App\BookCategory','category_id');
    }
}
