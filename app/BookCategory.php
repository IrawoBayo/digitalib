<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    protected $fillable = ['category'];

    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
