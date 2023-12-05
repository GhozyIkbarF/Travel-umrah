<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\List_City_Tour as ListCityTour;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('pages.package.package', compact('packages'));
    }

    public function list()
    {
        if (cache()->has('package_list')) {
            $packages = cache()->get('package_list');
            return response()->json([
                'package_plus' => $packages->package_plus,
                'package_regular' => $packages->package_regular,
                'message' => 'data from cache'
            ]);
        } else {
            $packages = new \stdClass(); // Creating an empty stdClass object
            $packages->package_plus = Package::select('id', 'name')->where('is_plus', 'yes')->get();
            $packages->package_regular = Package::select('id', 'name')->where('is_plus', 'no')->get();
            cache()->put('package_list', $packages, now()->addMinutes(1));
            return response()->json([
                'package_plus' => $packages->package_plus,
                'package_regular' => $packages->package_regular,
            ]);
        }
    }

    public function paket_umrah($param)
    {
        // Attempt to retrieve data from cache
        $package = Cache::remember("package_{$param}", now()->addHours(6), function () use ($param) {
            return Package::with('product')
                ->where('name', '=', $param)
                ->first();
        });

        // If the package is not found, you might want to handle this case accordingly
        if (!$package) {
            abort(404); // or redirect to a 404 page
        }

        // Load relationships for the product
        $package->load('product.relasi_maskapai', 'product.relasi_hotel_makkah', 'product.relasi_hotel_madinah', 'product.free', 'product.promo');

        // Attempt to retrieve data from cache
        $date = Cache::remember("package_{$param}_dates", now()->addHours(6), function () use ($package) {
            return Product::select('date')
                ->where('is_active', true)
                ->where('package_id', $package->id)
                ->orderBy('date', 'asc')
                ->get();
        });

        // If no dates are found, you might want to handle this case accordingly
        if ($date->isEmpty()) {
            abort(404); // or redirect to a 404 page
        }

        $start_date = $date[0]->date;
        $end_date = $date[count($date) - 1]->date;

        // Retrieve products directly from the package (already loaded)
        $products = $package->product;

        return view('pages.guest.package', compact('package', 'products', 'start_date', 'end_date'));
    }
    
    public function create()
    {
        $ListCityTours = ListCityTour::all();
        return view('pages.package.create-package', compact('ListCityTours'));
    }
    public function store(Request $request)
    {
        $package = new Package;
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'price_double' => 'required|numeric',
            'price_triple' => 'required|numeric',
            'price_quad' => 'required|numeric',
            'rating_hotel_makkah' => 'required|numeric|min:1|max:5',
            'rating_hotel_madinah' => 'required|numeric|min:1|max:5',
            'city_tour' => 'required',
            'is_plus' => 'required|in:yes,no',
        ]);
        // dd($request->all());
        $package->name = $request->name;
        $package->description = $request->description;
        $package->price_double = $request->price_double;
        $package->price_triple = $request->price_triple;
        $package->price_quad = $request->price_quad;
        $package->rating_hotel_makkah = $request->rating_hotel_makkah;
        $package->rating_hotel_madinah = $request->rating_hotel_madinah;
        $package->city_tour = $request->city_tour;
        $package->is_plus = $request->is_plus;
        $imageName = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/package'), $imageName);
        }
        $package->image = $imageName;


        $package->save();
        if ($package) {
            return redirect('/package')->with('success', 'Package added successfully.');
        }
        return back()->with('error', 'Failed to add package.');
    }

    public function edit($id)
    {
        $package = Package::find($id);
        $ListCityTours = ListCityTour::all();

        return view(
            'pages.package.edit-package',
            [
                'package' => $package,
                'ListCityTours' => $ListCityTours,
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $package = Package::find($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'price_double' => 'required|numeric',
            'price_triple' => 'required|numeric',
            'price_quad' => 'required|numeric',
            'rating_hotel_makkah' => 'required|numeric|min:1|max:5',
            'rating_hotel_madinah' => 'required|numeric|min:1|max:5',
            'city_tour' => 'required',
            'is_plus' => 'required|in:yes,no',
        ]);

        $package->name = $request->name;
        $package->description = $request->description;
        $package->price_double = $request->price_double;
        $package->price_triple = $request->price_triple;
        $package->price_quad = $request->price_quad;
        $package->rating_hotel_makkah = $request->rating_hotel_makkah;
        $package->rating_hotel_madinah = $request->rating_hotel_madinah;
        $package->city_tour = $request->city_tour;
        $package->is_plus = $request->is_plus;
        $imageName = $package->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/package'), $imageName);


            $path = public_path('img/package/' . $package->image);
            if ($package) {
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
            $package->image = $imageName;
        }
        $package->save();

        if ($package) {
            return redirect('/package')->with('success', 'Package added successfully.');
        }
        return back()->with('error', 'Failed to add package.');
    }

    public function destroy($id)
    {
        $package = Package::find($id);
        $path = public_path('img/package/' . $package->image);

        if ($package) {
            if (File::exists($path)) {
                File::delete($path);
                $package->delete();
                return back()->with('success', 'Package deleted successfully.');
            }
            return back()->with('success', 'Package deleted successfully.');
        } else {
            return back()->with('error', 'Package is not found.');
        }
    }
}
