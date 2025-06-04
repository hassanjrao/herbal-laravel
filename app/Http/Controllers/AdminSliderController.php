<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class AdminSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::latest()->get();

        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slider=null;

        return view('admin.sliders.add_edit', compact('slider'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'main_heading'=>'required',
            'sub_heading'=>'nullable'
        ]);

        Slider::create([
            'image'=>$request->file('image')->store('sliders'),
            'description'=>$request->description,
            'main_heading'=>$request->main_heading,
            'sub_heading'=>$request->sub_heading
        ]);


        return redirect()->route('admin.sliders.index')->withToastSuccess('Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $slider=Slider::findorfail($id);

        return view('admin.sliders.add_edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'main_heading'=>'required',
            'sub_heading'=>'nullable'
        ]);

        $slider=Slider::findorfail($id);

        $slider->main_heading = $request->main_heading;
        $slider->description = $request->description;
        $slider->sub_heading = $request->sub_heading;

        if ($request->hasFile('image')) {
            $slider->image = $request->file('image')->store('sliders');
        }

        $slider->save();


        return redirect()->route('admin.sliders.index')->withToastSuccess('Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $slider = Slider::findOrFail($id);
        $slider->delete();

        return redirect()->route('admin.sliders.index')->withToastSuccess('Deleted successfully.');
    }
}
