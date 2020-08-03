<?php

namespace App\Http\Controllers;

use App\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main_blog = Blog::where('main_status', '=', '1')
            ->orderBy('id', 'desc')
            ->take(1)
            ->get(
                [ 'id', 'title', 'slug', 'image', 'image_title', 'image_alt', 'content', 'page_title','page_description', 'publish_status', 'trending_status', 'main_status', 'created_at' ]
            );

        $main_blog_id = $main_blog->first()->id ?? false;

        $recent_blogs   = Blog::getRecentBlogs(false, 6, 0);
        $trending_blogs = Blog::getTrendingBlogs(true, $main_blog_id);

        $response['title'] =  'Custom Software Development Company Blog | CodeRiders';
        $response['description'] =  'The latest research-driven software development articles and news on web development and design, custom software development, software outsource, etc.';
        $response['main_blog'] = $main_blog;
        $response['recent_blogs'] = $recent_blogs;
        $response['trending_blogs'] = $trending_blogs;
        $response['next_page'] = (count($recent_blogs) >= 6) ? 1 : 0;

        return view('blog')->with('response', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $target_blog = Blog::findBySlug($slug);

        if($target_blog->isEmpty()) {
            return abort(404);
        }

        $target_blog_id = $target_blog->first()->id ?? false;

        $trending_blogs = Blog::getTrendingBlogs(true, $target_blog_id);
        $related_blogs  = Blog::findRelatedBlogs($target_blog_id);

        $response['title']          = $target_blog->first()->title;
        $response['description']    = $target_blog->first()->page_description;
        $response['target_blog']    = $target_blog;
        $response['trending_blogs'] = $trending_blogs;
        $response['related_blogs']  = $related_blogs;

        return view('blogInner')->with('response', $response);
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function load(Request $request)
    {
        $has_next_page = true;

        /* if(!$request->has('offset')) { */
        /*     abort(404); */
        /* } */
        $offset = $request->offset;
        $next_offset = $offset + 2;

        $all_blogs_count = Blog::getAllBlogsCount(true);
        $recent_blogs    = Blog::getRecentBlogs(true, 2, $offset);

        if($next_offset >= $all_blogs_count) {
            $has_next_page = false;
        }

        if(!$recent_blogs->isEmpty()) {
            foreach ($recent_blogs as $key => $value) {
                $date = date_create($value['created_at']);
                $date = date_format($date,"d.m.Y");

                /* $dateObject = Carbon::createFromFormat('d/m/Y', $date)->toDateString(); */
                /* $date = Carbon::createFromFormat('d-m-Y', '12-11-2020'); */

                $content = strip_tags($value['content']);
                $content_length = mb_strlen($content);
                $need_to_split = 200;
                $content = substr($content, 0, $need_to_split)."...";

                $recent_blogs[$key]->created_at = $date;
                $recent_blogs[$key]->content = $content;
                $recent_blogs[$key]->twitter_link  = $this->generateTwitterLink($value['slug']);
                $recent_blogs[$key]->facebook_link = $this->generateFacebookLink($value['slug']);
                $recent_blogs[$key]->linkedin_link = $this->generateLinkedInLink($value['slug'], $value['title'], $value['page_description']);
                $recent_blogs[$key]->google_link   = $this->generateGooglePlusLink($value['slug']);
            }

            $response['blogs']         = $recent_blogs;
            $response['code']          = 200;
            $response['has_next_page'] = $has_next_page;
            $response['next_offset']   = $next_offset;
        } else {
            $response['code']         = 404;
        }

        echo json_encode($response);
        /* die; */
    }

    //Helper Functions

    private function generateTwitterLink($slug) {

        $basePath = "http" . ((request()->server('SERVER_PORT') == 443) ? "s" : "") . "://" . request()->server('HTTP_HOST');
        /* $basePath = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST']; */
        return 'https://twitter.com/intent/tweet?url=' . $basePath . '/blog/' . $slug;
    }

    private function generateFacebookLink($slug) {
        $basePath = "http" . ((request()->server('SERVER_PORT') == 443) ? "s" : "") . "://" . request()->server('HTTP_HOST');
        return $basePath . '/blog/' . $slug;
    }

    private function generateLinkedInLink($slug, $title, $description) {
        $basePath = "http" . ((request()->server('SERVER_PORT') == 443) ? "s" : "") . "://" . request()->server('HTTP_HOST');
        return
            'https://www.linkedin.com/shareArticlemini=true&url=' . $basePath . '/blog/' . $slug . '&title=' . urlencode($title) . '&summary=' . urlencode($description) . '&source=' . $basePath . '/blog/' . $slug;
    }

    private function generateGooglePlusLink($slug) {
        $basePath = "http" . ((request()->server('SERVER_PORT') == 443) ? "s" : "") . "://" . request()->server('HTTP_HOST');
        return 'https://plus.google.com/share?url=' . $basePath . '/blog/' . $slug;
    }

}
