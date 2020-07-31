<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\BlogsRelatedBlog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/pages/blog')->with('recent_blogs', Blog::getRecentBlogs());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/pages/blogCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pageTitle' => ['required','max:255'],
            'pageDescription' => ['required', 'max:255'],
            'bannerTitle' => ['required', 'max:255'],
            'bannerText' => ['required', 'max:255'],
            'bannerSlug' => ['required', 'max:255'],
            'bannerSlugText' => ['required', 'max:255'],
            'title' => ['required', 'max:255'],
            'slug' => ['required', 'max:255'],
            'content' => ['required'],
            'blogImage' => ['required', 'mimes:jpg,jpeg,png', 'max:2000000'],
            'imageTitle' => ['required', 'max:255'],
            'imageAlt' => ['required', 'max:255'],
        ]);

        $path = $request->blogImage->store('attachments');

        $blog = Blog::make([
            'page_title' => $request->input('pageTitle'),
            'page_description' => $request->input('pageDescription'),
            'banner_title' => $request->input('bannerText'),
            'banner_text' => $request->input('bannerText'),
            'banner_slug' => $request->input('bannerSlug'),
            'banner_slug_text' => $request->input('bannerSlugText'),
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'content' => $request->input('content'),
            'image' => $path,
            'image_title' => $request->input('imageTitle'),
            'image_alt' => $request->input('imageAlt'),
            'publish_status' => (int)$request->has('publishStatus'),
            'trending_status' => (int)$request->has('trendingStatus'),
            'main_status' => (int)$request->has('mainStatus')
        ]);

        $blog->save();

        if ($request->has('relatedBlogs')) {
            BlogsRelatedBlog::destroy($blog->id);
            $related_blog_id = Blog::where('title', $request->input('relatedBlogs'))->get('id');
            if ($related_blog_id) {
                $blogRelatedBlogs = BlogsRelatedBlog::make([
                    'blog_id' => $blog->id,
                    'related_blog_id' => $related_blog_id
                ]);
                $blogRelatedBlogs->save();
            }

        }

        return redirect('admin/pages/blogCreate');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin/pages/blogs')->with('allBlogs', Blog::orderBy('id', 'asc')->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin/pages/blogCreate')
            ->with('blog', Blog::findOrFail($id))
            ->with('related_blogs', BlogsRelatedBlog::where('blog_id', $id)->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pageTitle' => ['required','max:255'],
            'pageDescription' => ['required', 'max:255'],
            'bannerTitle' => ['required', 'max:255'],
            'bannerText' => ['required', 'max:255'],
            'bannerSlug' => ['required', 'max:255'],
            'bannerSlugText' => ['required', 'max:255'],
            'title' => ['required', 'max:255'],
            'slug' => ['required', 'max:255'],
            'content' => ['required'],
            'blogImage' => ['required', 'mimes:jpg,jpeg,png', 'max:2000000'],
            'imageTitle' => ['required', 'max:255'],
            'imageAlt' => ['required', 'max:255'],
        ]);

        $blog = Blog::findOrFail($id);
        Storage::delete($blog->client_image);

        $path = $request->client_image->store('uploads');
        if ($request->hasFile('clientImage') && $request->file('clientImage')->isValid()) {
            $blog->page_title = $request->input('pageTitle');
            $blog->page_description = $request->input('pageDescription');
            $blog->banner_title = $request->input('bannerText');
            $blog->banner_text = $request->input('bannerText');
            $blog->banner_slug = $request->input('bannerSlug');
            $blog->banner_slug_text = $request->input('bannerSlugText');
            $blog->title = $request->input('title');
            $blog->slug = $request->input('slug');
            $blog->content = $request->input('content');
            $blog->image = $path;
            $blog->image_title = $request->input('imageTitle');
            $blog->image_alt = $request->input('imageAlt');
            $blog->publish_status = (int)$request->has('publishStatus');
            $blog->trending_status = (int)$request->has('trendingStatus');
            $blog->main_status = (int)$request->has('mainStatus');
            $blog->save();
        }

        if ($request->has('relatedBlogs')) {
            BlogsRelatedBlog::destroy($blog->id);
            $related_blog_id = Blog::where('title', $request->input('relatedBlogs'))->get('id');
            if ($related_blog_id) {
                $blogRelatedBlogs = BlogsRelatedBlog::make([
                    'blog_id' => $blog->id,
                    'related_blog_id' => $related_blog_id
                ]);
                $blogRelatedBlogs->save();
            }

        }

        return redirect('admin/pages/blogCreate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Storage::delete(Blog::findOrFail($id)->client_image);
        Blog::destroy($id);
    }


    /**
     * undocumented function
     *
     * @return void
     */
    public function changePublishStatus($id, $status)
    {
        $blog = Blog::findOrFail($id);
        $blog->publish_status = $status;
        $blog->save();
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function changeTrendingStatus($id, $status)
    {
        $blog = Blog::findOrFail($id);
        $blog->trending_status = $status;
        $blog->save();
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function changeMainStatus($id, $status)
    {
        $blog = Blog::findOrFail($id);
        $blog->main_status = $status;
        $blog->save();
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function findBlogs(Request $request, $searchString)
    {
        return Blog::select('id', 'image', 'title')->where('title', 'like', '%'.$searchString.'%')->whereNotIn('id', $request->input('ids'))->get();
    }
}
