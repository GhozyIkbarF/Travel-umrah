<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Galery;
use App\Models\Product;
use App\Models\Maskapai;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;


class GuestController extends Controller
{
    public function home()
{
    // Attempt to retrieve data from cache
    $testimonials = Cache::remember('testimonials', now()->addMinutes(5), function () {
        return Testimonial::take(8)->get();
    });
    $galeris = Cache::remember('galeris', now()->addMinutes(5), function () {
        return Galery::take(15)->get();
    });
    $blogs = Cache::remember('blogs', now()->addMinutes(5), function () {
        return Blog::take(4)->get();
    });
    $maskapais = Cache::remember('maskapais', now()->addMinutes(5), function () {
        return Maskapai::select('nama', 'image')->get();
    });

    $currentMonth = Carbon::now()->month;
    $futureMonth = ($currentMonth + 5) % 12;

    $monthsArray = [$currentMonth];
    for ($i = 1; $i <= $futureMonth; $i++) {
        $monthsArray[] = ($currentMonth + $i) % 12;
    }

    // Convert the array to a comma-separated string
    $monthsString = implode(',', $monthsArray);
    // Attempt to retrieve data from cache
    $program_umrahs = Cache::remember('program_umrahs', now()->addMinutes(5), function () use ($monthsString) {
        return Product::with(['relasi_maskapai', 'relasi_hotel_makkah', 'relasi_hotel_madinah', 'package'])->whereRaw("MONTH(date) IN ($monthsString)")->get();
    });

    return response()->view('pages.guest.home', compact('testimonials', 'galeris', 'blogs', 'maskapais', 'program_umrahs'))->header('Cache-Control', 'max-age=600');
}
}
