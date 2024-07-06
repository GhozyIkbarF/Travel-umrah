<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as ResizeImage;

class BlogController extends Controller
{
    public function index(){
        // $blogs = cache()->remember('admin_blogs', now()->addMinutes(5), function () {
        //     return Blog::all();
        // });
        $blogs = Blog::all();

        return view('pages.blog.blog-news', ['blogs' => $blogs]);
    }
    
    public function show($id){
        $blog = Blog::find($id);

        return view('pages.blog.detail-blog-news', ['blog' => $blog]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp', 
        ]);
        $blog = new Blog;
        
        $blog->title = $request->title;
        $blog->content = $request->content;
        $imageName = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME). time() . '.' . 'webp';
            $path = public_path('blog/');
            ResizeImage::make($image)
            ->save($path . $imageName, 60);
        }
        $blog->image = $imageName;

        $blog->save();

        return redirect('/blog-news');
    }

    public function edit($id){
        $blog = Blog::find($id);

        return view('pages.blog.edit-blog-news', ['blog' => $blog]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,webp', 
        ]);

        $blog = Blog::find($id);

        $blog->title = $request->title;
        $blog->content = $request->content;
        $imageName = $request->image;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME). time() . '.' . 'webp';
            $path = public_path('blog/');
            ResizeImage::make($image)
            ->save($path . $imageName, 60);

            $path_remove = public_path('blog/' . $blog->image);

            if($blog){
                if (File::exists($path_remove)) {
                    File::delete($path_remove);
                } 
        }
            $blog->image = $imageName;
        }

        $blog->save();

        if($blog){
            return redirect('/blog-news')->with('success', 'Blog updated successfully.');
        }

        return back()->with('error', 'Failed to update blog.');
    }


    public function destroy($id){
        $blog = Blog::find($id);
        $path = public_path('blog/' . $blog->image);

        if($blog){
            $blog->delete();
            if (File::exists($path)) {
                File::delete($path);
                return back()->with('success', 'Image deleted successfully.');
            } 
            return back()->with('success', 'Image deleted successfully.');
        }else{
            return back()->with('error', 'Image is not found.');
        }
    }

}
