<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Main;
use Illuminate\Http\Request;

class MainController extends Controller
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

    public function index()
    {
        $data = Main::First();
        return view('admin.pages.main', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'sub_title' => 'required|string',
        ],[
            'title.required' => "Title field is requried",
            'sub_title.required' => "Sub Title field is requried",
        ]);

        $data = Main::first();
        $data->title = $request->title;
        $data->sub_title = $request->sub_title;

        if ($request->file('image')) {
            $image = $request->file('image');
            if ($data->image == 'admin/images/main/bg.jpg') {

            } else {
                @unlink($data->image);
            }
            $image_ex = $image->getClientOriginalExtension();
            $image_name = rand(000000,1000000).'.'.$image_ex;
            $save_url = "admin/images/main/".$image_name;
            $image->move(public_path('admin/images/main/'),$image_name);
            $data->image = $save_url;
        }
        if ($request->file('resume')) {
            $resume = $request->file('resume');
            if ($data->resume == 'admin/resume/resume.pdf') {

            } else {
                @unlink($data->resume);
            }
            $resume_ex = $resume->getClientOriginalExtension();
            $resume_name = rand(000000, 1000000).'.'.$resume_ex;
            $resume_path = "admin/resume/".$resume_name;
            $resume->move(public_path('admin/resume/'),$resume_name);
            $data->resume = $resume_path;
        }

        $data->save();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Data Updated Successfully !',
        ];

        return redirect()->back()->with($notification);
    }

}
