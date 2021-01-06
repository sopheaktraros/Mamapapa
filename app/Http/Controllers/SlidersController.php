<?php

namespace App\Http\Controllers;

use App\Http\Resources\SliderDataTableResource;
use App\Slider;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use File;

class SlidersController extends Controller
{
    public function index(Request $request)
    {
        $sliders = Slider::orderBy('id', 'DESC')->paginate(12);

        return view('sliders.index')->with([
            'sliders' => $sliders
        ]);
    }

    public function create()
    {
        return view('sliders.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required',
        ],[
            'image.required' => 'The image field is required',
        ]);
        
        $data = $request->all();
        $data['image'] = uploadImage($request->image);

        Slider::create($data);

        toast('success','Slider has been created.');
        return redirect()->back();
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
    
        return view('sliders.edit')->with([
            'slider' => $slider,
        ]);
    }

    public function update(Request $request ,$id)
    {
        $this->validate($request,[
            'image' => 'required',
        ],[
            'image.required' => 'The image field is required',
        ]);

        $data = $request->all();

        $slider = Slider::findOrFail($id);

        $slider->update($data);

        toast('success','Slider has been updated.');
        return redirect()->back();
    }

    public function show($id){
        //
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        
        $image = $slider->image;
       
        if(File::exists($image))
        {
            File::delete($image);
        }
        
        $slider->delete();

        toast('success','Slider has been deleted.');
        return redirect()->back();
    }
}
