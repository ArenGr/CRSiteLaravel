<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogsRelatedBlog extends Model
{
    /**
     * undocumented function
     *
     * @return void
     */
    public function blog()
    {
        return $this->belongsTo(Blog::class, 'related_blog_id', 'id');
    }
    
}
