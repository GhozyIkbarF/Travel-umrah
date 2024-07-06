<?php

use App\Mail\Email;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MaskapaiController;
use App\Http\Controllers\FreePromoController;
use App\Http\Controllers\GuestBlogController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ListCityTourController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GuestController::class, 'home'])->name('guest.home');

Route::get('/tentang-kami', function () {
    return view('pages.guest.tentang-kami');
})->name('guest.tentang-kami');

Route::get('/jadwal', function () {
    return view('pages.guest.jadwal');
})->name('guest.jadwal');

Route::get('/hubungi-kami', function () {
    return view('pages.guest.hubungi-kami');
})->name('guest.hubungi-kami');

Route::get('/guest-blog-news', [GuestBlogController::class, 'index'])->name('guest.blog-news');
Route::get('/guest-blog-news/{id}', [GuestBlogController::class, 'show'])->name('guest.blog-news-detail');

Route::get('/guest-galeri', [GaleryController::class, 'guestIndex'])->name('guest.galeri');

Route::get('/package/list', [PackageController::class, 'list'])->name('package.list');
Route::get('/paket-umrah/{param}', [PackageController::class, 'paket_umrah'])->name('package.paket-umrah');
Route::get('/program-umrah/{id}', [ProductController::class, 'program_umrah'])->name('product.program-umrah');
Route::get('/search-program-umrah', [ProductController::class, 'search_program_umrah'])->name('product.search-program-umrah');

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/inbox', function () {
        return view('pages.inbox');
    })->name('inbox.index');

    // =====galeri======
    Route::resource('galeri', GaleryController::class)->only([
        'index', 'store', 'destroy'
    ]);

    // ======blog=====
    Route::get('/blog-news/create', function () {
        return view('pages.blog.create-blog-news');
    })->name('blog-news.create');
    Route::resource('blog-news', BlogController::class)->except([
        'create',
    ]);

    // testimoni
    Route::get('/testimoni/create', function () {
        return view('pages.testimoni.create-testimoni');
    })->name('testimoni.create');
    Route::resource('testimoni', TestimonialController::class)->except([
        'create'
    ]);
   
    // ======Maskapai=====
    Route::get('/maskapai/create', function () {
        return view('pages.setting.maskapai.create-maskapai');
    })->name('maskapai.create');
    Route::resource('maskapai', MaskapaiController::class)->except([
        'create'
    ]);

    // ======Hotel=====
    Route::get('/hotel/madinah', [HotelController::class, 'getHotelMadinah'])->name('hotel.madinah');
    Route::get('/hotel/makkah', [HotelController::class, 'getHotelMakkah'])->name('hotel.makkah');
    Route::post('/hotel/{id}', [HotelController::class, 'update'])->name('hotel.update');
    Route::resource('hotel', HotelController::class)->only([
        'index', 'store', 'destroy'
    ]);
    
    Route::resource('list-city-tour', ListCityTourController::class)->only([
        'index', 'store', 'destroy'
    ]);

    // package
    // Route::get('/paket', [PackageController::class, 'index'])->name('package.index');
    Route::get('/paket-create', [PackageController::class, "create"])->name('package.create');
    // Route::post('/paket', [PackageController::class, 'store'])->name('package.store');
    // Route::get('/paket/{id}/edit', [PackageController::class, 'edit'])->name('package.edit');
    Route::post('/paket/{id}/update', [PackageController::class, 'update'])->name('package.update');
    // Route::delete('/paket/{id}/delete', [PackageController::class, 'destroy'])->name('package.destroy');
    Route::resource('paket', PackageController::class)->except(['create', 'update']);

    // free-promo
    Route::get('/free-promo', [FreePromoController::class, 'index'])->name('free-promo.index');
    Route::post('/free-promo/store/{param}', [FreePromoController::class, 'store'])->name('free-promo.store');
    Route::post('/free-promo/update/{param}/{id}', [FreePromoController::class, 'update'])->name('free-promo.update');
    Route::delete('/free-promo/delete/{param}/{id}', [FreePromoController::class, 'destroy'])->name('free-promo.destroy');
 
    // product
    Route::get('/program-umrah-admin/{param}', [ProductController::class, 'index'])->name('product.index');
    Route::get('/program-umrah-admin/create/{param}', [ProductController::class, 'create'])->name('product.create');
    Route::get('/program-umrah-admin/edit/{param}/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('/program-umrah-admin/detail/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::post('/program-umrah-admin/{param}', [ProductController::class, 'store'])->name('product.store');
    Route::post('/program-umrah-admin/update/{param}/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/program-umrah-admin/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});


    // route::get('/sendmail', function(){
    //     $text = 'hai kamu';
    //     Mail::to('holagaren1@gmail.com')->send(new Email($text));
    // });

require __DIR__ . '/auth.php';
