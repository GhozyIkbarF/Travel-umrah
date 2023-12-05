<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index(){
        $hotels = Hotel::all();
        return view('pages.setting.hotel.hotel', compact('hotels'));
    }

    public function getHotelMadinah(){
        $hotels = Hotel::where('kota', 'madinah')->get();
        return response()->json($hotels);
    }

    public function getHotelMakkah(){
        $hotels = Hotel::where('kota', 'makkah')->get();
        return response()->json($hotels);
    }

    public function store(Request $request){
        $hotel = new Hotel;
        $request->validate([
            'nama' => 'required',
            'kota' => 'required|in:makkah,madinah',
            'rating' => 'required|numeric|min:1|max:5',
        ]);
        $hotel->nama = $request->nama;
        $hotel->kota = $request->kota;
        $hotel->rating = $request->rating;
      
        $hotel->save();
        if($hotel){
            return redirect('/hotel')->with('success', 'Hotel added successfully.');
        }
        return back()->with('error', 'Failed to add hotel.');
    }

    public function edit($id){
        $hotel = Hotel::find($id);

        return view('pages.setting.hotel.edit-hotel', ['hotel' => $hotel]);
    }

    public function update(Request $request, $id){
        $hotel = Hotel::find($id);
        $request->validate([
            'nama' => 'required',
            'kota' => 'required|in:makkah,madinah',
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        $hotel->nama = $request->nama;
        $hotel->kota = $request->kota;
        $hotel->rating = $request->rating;
      
        $hotel->save();

        if($hotel){
            return redirect('/hotel')->with('success', 'Hotel added successfully.');
        }
        return back()->with('error', 'Failed to add hotel.');
    }

    public function destroy($id){
        $hotel = Hotel::find($id);

        if($hotel){
            $hotel->delete();
            return back()->with('success', 'Hotel deleted successfully.');
        }else{
            return back()->with('error', 'Hotel is not found.');
        }
    }
}
