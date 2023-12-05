<?php

namespace App\Http\Controllers;

use App\Models\List_City_Tour as ListCityTour;
use Illuminate\Http\Request;

class ListCityTourController extends Controller
{
    public function index(){
        $ListCityTours = ListCityTour::all();
        return view('pages.setting.list-city-tour.list-city-tour', compact('ListCityTours'));
    }

    public function store(Request $request){
        $ListCityTour = new ListCityTour;
        $request->validate([
            'name' => 'required',
        ]);
        $ListCityTour->name = $request->name;
      
        $ListCityTour->save();
        if($ListCityTour){
            return redirect('/list-city-tour')->with('success', 'Hotel added successfully.');
        }
        return back()->with('error', 'Failed to add .');
    }

    public function edit($param){
        $ListCityTour = ListCityTour::where('name', $param)->first();

        return view('pages.setting.list-city-tour.edit-list-city-tour', ['ListCityTour' => $ListCityTour]);
    }

    public function update(Request $request, $param){
        $ListCityTour = ListCityTour::where('name', $param)->first();;
        $request->validate([
            'name' => 'required',
        ]);

        $ListCityTour->name = $request->name;
      
        $ListCityTour->save();

        if($ListCityTour){
            return redirect('/list-city-tour')->with('success', 'Hotel added successfully.');
        }
        return back()->with('error', 'Failed to add .');
    }

    public function destroy($param){
        $ListCityTour = ListCityTour::where('name', $param)->delete();;

        if($ListCityTour){
            return back()->with('success', 'Hotel deleted successfully.');
        }else{
            return back()->with('error', 'Hotel is not found.');
        }
    }
}
