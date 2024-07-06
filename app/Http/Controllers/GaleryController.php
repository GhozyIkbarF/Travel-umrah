<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image as ResizeImage;


class GaleryController extends Controller
{
    public function index(): View
    {
        $images = Galery::all();
        return view('pages.galeri', ['images' => $images]);
    }

    public function guestIndex()
    {
        $images = Cache::remember('galery', now()->addMinutes(5), function () {
            return Galery::all();
        });

        return response()
            ->view('pages.guest.galeri', compact('images'))
            ->header('Cache-Control', 'max-age=600');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif', // Adjust validation rules as needed
        // ]);

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . time() . '.' . 'webp';
            $path = public_path('img/gallery/');
            ResizeImage::make($image)
                ->save($path . $imageName, 60);


            $galery = Galery::create([
                'image' => $imageName,
            ]);
            if ($galery) {
                return back()->with('success', 'Image uploaded successfully.');
            }
        }
        return back()->with('error', 'Failed to upload image.');
    }

    public function destroy($id)
    {
        $galery = Galery::find($id);
        $path = public_path('img/gallery/' . $galery->image);


        if ($galery) {
            $galery->delete();
            if (File::exists($path)) {
                File::delete($path);
                return back()->with('success', 'Image deleted successfully.');
            }
        } else {
            return back()->with('error', 'Image is not found.');
        }
    }
}
