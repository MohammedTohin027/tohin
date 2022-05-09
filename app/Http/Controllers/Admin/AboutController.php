<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::orderBy('id', 'desc')->get();
        return view('admin.about.list', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
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
            'title' => 'required|string',
            'date' => 'required',
            'description' => 'required',
        ],[
            'title.required' => "Title field is requried",
            'date.required' => "date field is requried",
            'description.required' => "Description field is requried",
        ]);

        $data = new About();
        $data->title = $request->title;
        $data->date = $request->date;
        $data->description = $request->description;

        if ($request->file('image')) {
            $image = $request->file('image');
            $image_ex = $image->getClientOriginalExtension();
            $image_name = rand(000000,1000000).'.'.$image_ex;
            $save_url = "upload/about/".$image_name;
            $image->move(public_path('upload/about/'),$image_name);
            $data->image = $save_url;
        }

        $data->created_at = Carbon::now();
        $data->save();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Data Store Successfully !',
        ];

        return redirect()->route('about.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        About::find($id)->update([
            'status' => 1,
            'updated_at'=> Carbon::now(),
        ]);
        $notification = [
            'alert-type' => 'success',
            'message' => 'Data Active Successfully !',
        ];
        return redirect()->back()->with($notification);
    }
    public function inactive($id)
    {
        About::find($id)->update([
            'status' => 0,
            'updated_at'=> Carbon::now(),
        ]);
        $notification = [
            'alert-type' => 'success',
            'message' => 'Data Inactive Successfully !',
        ];
        return redirect()->back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editData = About::find($id);
        return view('admin.about.create', compact('editData'));
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
            'title' => 'required|string',
            'date' => 'required',
            'description' => 'required',
        ],[
            'title.required' => "Title field is requried",
            'date.required' => "date field is requried",
            'description.required' => "Description field is requried",
        ]);

        $data = About::find($id);
        $data->title = $request->title;
        $data->date = $request->date;
        $data->description = $request->description;

        if ($request->file('image')) {
            if ($data->image == 'upload/no_image_3.jpg') {

            } else {
                @unlink($data->image);
            }
            $image = $request->file('image');
            $image_ex = $image->getClientOriginalExtension();
            $image_name = rand(000000,1000000).'.'.$image_ex;
            $save_url = "upload/about/".$image_name;
            $image->move(public_path('upload/about/'),$image_name);
            $data->image = $save_url;
        }

        $data->updated_at = Carbon::now();
        $data->save();
        $notification = [
            'alert-type' => 'success',
            'message' => 'Data Updated Successfully !',
        ];
        return redirect()->route('about.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::find($id);
        @unlink($about->image);
        $about->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Data Deleted Successfully !',
        ];
        return redirect()->back()->with($notification);
    }
}