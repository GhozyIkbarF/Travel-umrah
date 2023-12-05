<?php

namespace App\Http\Controllers;


use App\Models\Free;
use App\Models\Hotel;
use App\Models\Promo;
use App\Models\Package;
use App\Models\Product;
use App\Models\Maskapai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as ResizeImage;

class ProductController extends Controller
{
    public function index($param)
    {
        $package = Package::select('id')->where('name', $param)->first();
        $products = Product::with(['relasi_maskapai:id,nama', 'relasi_hotel_makkah', 'relasi_hotel_madinah', 'free', 'promo'])->where('package_id', $package->id)->get();
        return view('pages.product.product',
            [
                'products' => $products,
                'title' => $param,
            ]);
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('pages.product.detail-product', ['product' => $product]);
    }

    public function program_umrah($id){
        $product = Product::with(['relasi_maskapai', 'relasi_hotel_makkah', 'relasi_Hotel_madinah', 'package', 'free', 'promo'])->find($id);
        return view('pages.guest.program-umrah', ['product' => $product]);
    }

    public function search_program_umrah(Request $request)
    {
        $dateRanges = $request->param_month;
        $products = Product::with(['relasi_maskapai:id,nama', 'relasi_hotel_makkah', 'relasi_hotel_madinah', 'free', 'promo'])
                    ->where('package_id', $request->package_id)
                    ->where(function ($query) use ($dateRanges) {
                        foreach ($dateRanges as $dateRange) {
                            $query->orWhereMonth('date', $dateRange);
                        }
                    })->get();
        return response()->json($products);
    }

    public function create($param)
    {
        $package = Package::where('name', $param)->first();
        $is_plus = $package->is_plus;
        $hotels_makkah = Hotel::where('kota', 'makkah')->get();
        $hotels_madinah = Hotel::where('kota', 'madinah')->get();
        $maskapais = Maskapai::all();
        $promos = Promo::all();
        $frees = Free::all();
        return view(
            'pages.product.create-product',
            [
                'title' => $param,
                'package' => $package,
                'maskapais' => $maskapais,
                'hotels_makkah' => $hotels_makkah,
                'hotels_madinah' => $hotels_madinah,
                'promos' => $promos,
                'frees' => $frees,
                'is_plus' => $is_plus,
            ]
        );
    }

    public function store(Request $request, $param)
    {
        $request->validate([
            'date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'maskapai' => 'required',
            'price_double' => 'required|numeric',
            'price_triple' => 'required|numeric',
            'price_quad' => 'required|numeric',
            'hotel_makkah' => 'required|numeric',
            'hotel_madinah' => 'required|numeric',
            'rating_hotel_plus' => 'numeric',
            'kuota' => 'required|numeric',
            'package_id' => 'required|numeric',
            'free' => 'array',
            'promo' => 'array',

        ]);

        $product = new Product;

        $product->date = $request->date;
        $product->image = $request->image;
        $product->maskapai = $request->maskapai;
        $product->price_double = $request->price_double;
        $product->price_triple = $request->price_triple;
        $product->price_quad = $request->price_quad;
        $product->hotel_makkah = $request->hotel_makkah;
        $product->hotel_madinah = $request->hotel_madinah;
        $product->rating_hotel_plus = $request->rating_hotel_plus;
        $product->kuota = $request->kuota;
        $product->package_id = $request->package_id;

        $imageName = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME). time() . '.' . 'webp';
            $path = public_path('img/product/');
            ResizeImage::make($image)
            ->save($path . $imageName, 60);
        }
        $product->image = $imageName;

        $product->save();
        $product->free()->attach($request->free);
        $product->promo()->attach($request->promo);

        return redirect('/program-umrah-admin/' . $param)->with('success', 'Product added successfully.');
    }

    public function edit($param, $id)
    {
        $package = Package::where('name', $param)->first();
        $is_plus = $package->is_plus;
        $hotels_makkah = Hotel::where('kota', 'makkah')->get();
        $hotels_madinah = Hotel::where('kota', 'madinah')->get();
        $maskapais = Maskapai::all();
        $promos = Promo::all();
        $frees = Free::all();
        $product = Product::with(['relasi_maskapai:id,nama', 'relasi_hotel_makkah', 'relasi_hotel_madinah', 'free:id', 'promo:id'])->find($id);

        $array_free = [];
        foreach ($product->free as $free) {
            array_push($array_free, $free->id);
        }
        $product->free = $array_free;
        
        $array_promo = [];
        foreach ($product->promo as $promo) {
            array_push($array_promo, $promo->id);
        }
        $product->promo = $array_promo;
      

        return view('pages.product.edit-product', 
        [
            'product' => $product,
            'title' => $param,
            'package' => $package,
            'maskapais' => $maskapais,
            'hotels_makkah' => $hotels_makkah,
            'hotels_madinah' => $hotels_madinah,
            'promos' => $promos,
            'frees' => $frees,
            'is_plus' => $is_plus,
    ]);
    }

    public function update(Request $request, $param, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'image' => 'image|mimes:jpeg,png,jpg,webp',
            'maskapai' => 'required',
            'price_double' => 'required|numeric',
            'price_triple' => 'required|numeric',
            'price_quad' => 'required|numeric',
            'hotel_makkah' => 'required|numeric',
            'hotel_madinah' => 'required|numeric',
            'rating_hotel_plus' => 'numeric',
            'kuota' => 'required|numeric',
            'package_id' => 'required|numeric',
            'free' => 'array',
            'promo' => 'array',
        ]);

        // dd($request->all());    
        $product = Product::find($id);

        $product->date = $request->date;
        // $product->image = $request->image;
        $product->maskapai = $request->maskapai;
        $product->price_double = $request->price_double;
        $product->price_triple = $request->price_triple;
        $product->price_quad = $request->price_quad;
        $product->hotel_makkah = $request->hotel_makkah;
        $product->hotel_madinah = $request->hotel_madinah;
        $product->rating_hotel_plus = $request->rating_hotel_plus;
        $product->kuota = $request->kuota;

        $imageName = $product->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME). time() . '.' . 'webp';
            $path = public_path('img/product/');
            ResizeImage::make($image)
            ->save($path . $imageName, 60);

            $path_remove = public_path('img/product/' . $product->image);

            if ($product) {
                if (File::exists($path_remove)) {
                    File::delete($path_remove);
                }
            }
            $product->image = $imageName;
        }

        $product->save();
        $product->free()->sync($request->free);
        $product->promo()->sync($request->promo);

        if ($product) {
            return redirect('/program-umrah-admin/' . $param)->with('success', 'Product updated successfully.');
        }

        return back()->with('error', 'Failed to update product.');
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        $path = public_path('img/product/' . $product->image);

        if ($product) {
            $product->delete();
            if (File::exists($path)) {
                File::delete($path);
                return back()->with('success', 'Image deleted successfully.');
            }
            return back()->with('success', 'Image deleted successfully.');
        } else {
            return back()->with('error', 'Image is not found.');
        }
    }
}
