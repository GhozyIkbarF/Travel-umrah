<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    //
    public function index(){
        $testimonials = Testimonial::all();
        return view('pages.testimoni.testimoni', compact('testimonials'));
    }

    public function store(Request $request){
        $testimoni = new Testimonial;
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'message' => 'required|max:255',
            'rating' => 'required|numeric|min:1|max:5',
            'image' => 'required|image|mimes:jpeg,png,jpg', // Adjust validation rules as needed
        ]);
        $testimoni->name = $request->name;
        $testimoni->message = $request->message;
        $testimoni->rating = $request->rating;
        $imageName = '';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME). time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('testimonial'), $imageName);
        }
        $testimoni->image = $imageName;

        $testimoni->save();
        if($testimoni){
            return redirect('/testimoni')->with('success', 'Testimonial added successfully.');
        }
        return back()->with('error', 'Failed to add testimonial.');
    }

    public function edit($id){
        $testimoni = Testimonial::find($id);

        return view('pages.testimoni.edit-testimoni', ['testimoni' => $testimoni]);
    }

    public function update(Request $request, $id){
        $testimonial = Testimonial::find($id);
        $request->validate([
            'name' => 'required',
            'message' => 'required|max:255',
            'rating' => 'required|numeric|min:1|max:5',
            'image' => 'image|mimes:jpeg,png,jpg,gif', // Adjust validation rules as needed
        ]);

        $testimonial->name = $request->name;
        $testimonial->message = $request->message;
        $testimonial->rating = $request->rating;
        $imageName = $testimonial->image;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME). time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('testimonial'), $imageName);


            $path = public_path('testimonial/' . $testimonial->image);
            if($testimonial){
                if (File::exists($path)) {
                    File::delete($path);
                } 
        }
            $testimonial->image = $imageName;

        }
        $testimonial->save();

        if($testimonial){
            return redirect('/testimoni')->with('success', 'Testimonial added successfully.');
        }
        return back()->with('error', 'Failed to add testimonial.');
    }

    public function destroy($id){
        $testimonial = Testimonial::find($id);
        $path = public_path('testimonial/' . $testimonial->image);

        if($testimonial){
            $testimonial->delete();
            if (File::exists($path)) {
                File::delete($path);
                return back()->with('success', 'Testimonial deleted successfully.');
            } 
            return back()->with('success', 'Testimonial deleted successfully.');
        }else{
            return back()->with('error', 'Testimonial is not found.');
        }
    }
}
