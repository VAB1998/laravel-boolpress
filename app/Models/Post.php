<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'author', 'post_content', 'post_date', 'category_id'];

    public function category(){
        $this->belongsTo('App\Models\Category');
    }
}
