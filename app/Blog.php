<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /* protected $fillable = ['*']; */

    /**
     * undocumented function
     *
     * @return void
     */
    public function blogsRelatedBlog()
    {
        return $this->hasMany(BlogsRelatedBlog::class, 'blog_id', 'id');
    }


    /**
     * undocumented function
     *
     * @return void
     */
    public static function getRecentBlogs($published=false, $limit = 6, $offset = 0)
    {
        return self::when($published, function($query){
            $query
                ->where(
                    [
                        ['publish_status', '=', '1'],
                        ['main_status', '<>', '1']
                    ]
                );
        })
            ->orderBy('id', 'desc')
            ->skip($offset)
            ->take($limit)
            ->get([ 'id', 'title', 'slug', 'image', 'content', 'page_description',
                  'publish_status', 'trending_status', 'main_status', 'created_at']);
    }
    
    /**
     * undocumented function
     *
     * @return void
     */
    public static function getTrendingBlogs($published = false, $except_id = false)
    {
        return self::when($published, function($query){
            $query
                ->where(
                    [
                        ['publish_status', '=', '1'], 
                        ['trending_status', '=', '1']
                    ]
                );
        })
            ->when($except_id, function($query) use ($except_id){
                $query
                    ->where('id', '<>', $except_id);
        })
          ->orderBy('id', 'desc')
          ->take('3')
          ->get(['id', 'title', 'slug', 'content', 'image', 'page_description', 'created_at']);
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)
            ->get();
    }
    
    
    /**
     * undocumented function
     *
     * @return void
     */
    public static function findRelatedBlogs($id)
    {
        return self::findOrFail($id)->blogsRelatedBlog()->select('related_blog_id')->with(array('blog'=>function($query){
            $query->select('id', 'title', 'content', 'slug', 'created_at', 'image', 'page_description');
        }))->get();
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public static function getAllBlogsCount($publish = false) { 
        $blogs = self::when($publish, function($query){
            $query->where(
                    [
                        ['publish_status', '=', '1'], 
                        ['main_status', '<>', '1']
                    ]
                );
        })->count();

        return $blogs;
    }
}
