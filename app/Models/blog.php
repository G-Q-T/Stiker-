<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    //
    protected $fillable = ['blog_category_id', 'slug', 'name', 'brief_description', 'content', 'author', 'cover_path'];

    public function categoryblog()
    {
        return $this->belongsTo(CategoryBlog::class, 'blog_category_id');
    }
}
