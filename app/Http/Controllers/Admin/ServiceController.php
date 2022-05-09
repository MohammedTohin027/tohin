<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
        $services = Service::orderBy('id', 'desc')->get();
        return view('admin.service.list', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
        ],[
            'icon.required' => "Icon field is requried",
            'title.required' => "Title field is requried",
            'description.required' => "Description field is requried",
        ]);

        $data = Service::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'alert-type' => 'success',
            'message' => 'Data Updated Successfully !',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        Service::find($id)->update([
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
        Service::find($id)->update([
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
        $editData = Service::find($id);
        return view('admin.service.create', compact('editData'));
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
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
        ],[
            'icon.required' => "Icon field is requried",
            'title.required' => "Title field is requried",
            'description.required' => "Description field is requried",
        ]);

        Service::find($id)->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'updated_at' => Carbon::now(),
        ]);
        $notification = [
            'alert-type' => 'success',
            'message' => 'Data Updated Successfully !'
        ];
        return redirect()->route('service.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::find($id)->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Data Deleted Successfully !',
        ];
        return redirect()->back()->with($notification);
    }
}