<?php

namespace App\Http\Controllers;

use App\Models\Free;
use App\Models\Promo;
use Illuminate\Http\Request;

class FreePromoController extends Controller
{
    public function index(){
        $frees = Free::all();
        $promos = Promo::all();
        return view('pages.setting.free-promo.free-promo', compact('frees', 'promos'));
    }
    

    //Store Controller
    public function store(Request $request, $param){

        $request->validate([
            'name' => 'required',
        ]);
        if($param == 'free'){
            $free = new Free;
            $free->name = $request->name;
            $free->save();
            if($free){
                return redirect('/free-promo')->with('success', 'free added successfully.');
            }
            return back()->with('error', 'Failed to add free.');
        }elseif ($param == 'promo') {
            $promo = new Promo;
            $promo->name = $request->name;
            $promo->save();
            if($promo){
                return redirect('/free-promo')->with('success', 'promo added successfully.');
            }
            return back()->with('error', 'Failed to add promo.');
        }else{
            return back()->with('error', 'Error parameter.');
        }
    }

    //update Controller
    public function update(Request $request, $param,  $id){
        $request->validate([
            'name' => 'required'
        ]);
        if($param == 'free'){
            $free = Free::find($id);
            $free->name = $request->name;
            $free->save();
            if($free){
                return redirect('/free-promo')->with('success', 'free added successfully.');
            }
            return back()->with('error', 'Failed to add free.');
        }elseif ($param == 'promo') {
            $promo = Promo::find($id);
            $promo->name = $request->name;
            $promo->save();
            if($promo){
                return redirect('/free-promo')->with('success', 'promo added successfully.');
            }
            return back()->with('error', 'Failed to add promo.');
        }else{
            return back()->with('error', 'Error parameter.');
        }
    }


    //delete Controller
    public function destroy($param, $id){
        if($param == 'free'){
            $free = Free::find($id);
            if($free){
                $free->delete();
                return back()->with('success', 'free deleted successfully.');
            }else{
                return back()->with('error', 'free is not found.');
            }
        }elseif ($param == 'promo') {
            $promo = Promo::find($id);
            if($promo){
                $promo->delete();
                return back()->with('success', 'promo deleted successfully.');
            }else{
                return back()->with('error', 'promo is not found.');
            }
        }else{
            return back()->with('error', 'Error parameter.');
        }
    }
}
