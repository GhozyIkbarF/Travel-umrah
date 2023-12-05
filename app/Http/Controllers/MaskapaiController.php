<?php

namespace App\Http\Controllers;

use App\Models\Maskapai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class MaskapaiController extends Controller
{
    public function index()
    {
        $maskapais = Maskapai::all();
        return view('pages.setting.maskapai.maskapai', compact('maskapais'));
    }

    public function store(Request $request){
        $maskapai = new Maskapai;
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp', // Adjust validation rules as needed
        ]);
        $maskapai->nama = $request->name;
        $imageName = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME). time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('maskapai-img'), $imageName);
        }
        $maskapai->image = $imageName;

        $maskapai->save();
        if($maskapai){
            return back()->with('success', 'Maskapai added successfully.');
        }
        return back()->with('error', 'Failed to add maskapai.');
    }

    public function edit($id){
        $maskapai = Maskapai::find($id);

        return view('pages.setting.maskapai.edit-maskapai', ['maskapai' => $maskapai]);
    }

    public function update(Request $request, $id){
        $maskapai = Maskapai::find($id);
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif', // Adjust validation rules as needed
        ]);

        $maskapai->nama = $request->name;
        $imageName = $maskapai->image;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME). time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('maskapai-img'), $imageName);


            $path = public_path('maskapai-img/' . $maskapai->image);
            if($maskapai){
                if (File::exists($path)) {
                    File::delete($path);
                } 
        }
            $maskapai->image = $imageName;

        }
        $maskapai->save();

        if($maskapai){
            return redirect('/maskapai')->with('success', 'Maskapai added successfully.');
        }
        return back()->with('error', 'Failed to add maskapai.');
    }

    public function destroy($id){
        $maskapai = Maskapai::find($id);
        $path = public_path('maskapai-img/' . $maskapai->image);

        if($maskapai){
            $maskapai->delete();
            if (File::exists($path)) {
                File::delete($path);
                return back()->with('success', 'Maskapai deleted successfully.');
            } 
            return back()->with('success', 'Maskapai deleted successfully.');
        }else{
            return back()->with('error', 'Maskapai is not found.');
        }
    }
}
