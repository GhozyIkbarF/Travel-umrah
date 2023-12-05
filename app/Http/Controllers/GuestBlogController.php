<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class GuestBlogController extends Controller
{
    public function index(){
        $blogs = Cache::remember('guest_blog', now()->addMinutes(5), function () {
            return Blog::all();
        });
        return response()->view('pages.guest.blog.blog-news', ['blogs' => $blogs])->header('Cache-Control', 'max-age=600');
    }

    public function show($id){
        $blog = Blog::find($id);
        $other_blogs = Blog::select('id', 'title', 'image')->where('id', '!=', $id)->get();
        return view('pages.guest.blog.detail-blog-news', 
        [
            'blog' => $blog,
            'other_blogs' => $other_blogs,
        ]);
    }
}
