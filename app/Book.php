<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name','user_id','author_id','quantity_page','book_cover'
    ];
}
