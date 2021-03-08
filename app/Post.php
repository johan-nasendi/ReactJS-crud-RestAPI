<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post_data';
    protected $fillable = [
        'title', 'des',
    ];
}
