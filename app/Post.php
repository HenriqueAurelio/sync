<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name',
        'author',
        'category_id',
        'text'
    ];
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'post_category', 'post_id', 'category_id',);
    }
}
