<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
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
        $portfolios = Portfolio::orderBy('id', 'desc')->get();
        return view('admin.portfolio.list', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.create');
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
            'sub_title' => 'required|string',
            'small_image' => 'required',
            'big_image' => 'required',
            'client' => 'required',
            'category' => 'required',
            'description' => 'required',
            // 'url' => 'required',
        ],[
            'title.required' => "Title field is requried",
            'sub_title.required' => "Sub Title field is requried",
            'small_image.required' => "Small Image field is requried",
            'big_image.required' => "Big Image field is requried",
            'client.required' => "Client field is requried",
            'category.required' => "Category field is requried",
            'description.required' => "Description field is requried",
        ]);


        // dd($request->all());

        $data = new Portfolio;
        $data->title = $request->title;
        $data->sub_title = $request->sub_title;
        $data->client = $request->client;
        $data->category = $request->category;
        $data->description = $request->description;
        $data->url = $request->url;
        $data->created_at = Carbon::now();

        if ($request->file('small_image')) {
            $image = $request->file('small_image');
            $image_ex = $image->getClientOriginalExtension();
            $image_name = rand(000000,1000000).'.'.$image_ex;
            $save_url = "upload/portfolio/small_images/".$image_name;
            $image->move(public_path('upload/portfolio/small_images/'),$image_name);
            $data->small_image = $save_url;
        }
        if ($request->file('big_image')) {
            $image = $request->file('big_image');
            $image_ex = $image->getClientOriginalExtension();
            $image_name = rand(000000,1000000).'.'.$image_ex;
            $save_url = "upload/portfolio/big_images/".$image_name;
            $image->move(public_path('upload/portfolio/big_images/'),$image_name);
            $data->big_image = $save_url;
        }

        $data->save();
        $notification = [
            'alert-type' => 'success',
            'message' => 'Data Store Successfully !',
        ];

        return redirect()->route('portfolio.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        Portfolio::find($id)->update([
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
        Portfolio::find($id)->update([
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
        $editData = Portfolio::find($id);
        return view('admin.portfolio.create', compact('editData'));
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
            'sub_title' => 'required|string',
            'client' => 'required',
            'category' => 'required',
            'description' => 'required',
            // 'url' => 'required',
        ],[
            'title.required' => "Title field is requried",
            'sub_title.required' => "Sub Title field is requried",
            'client.required' => "Client field is requried",
            'category.required' => "Category field is requried",
            'description.required' => "Description field is requried",
        ]);

        $data = Portfolio::find($id);
        $data->title = $request->title;
        $data->sub_title = $request->sub_title;
        $data->client = $request->client;
        $data->category = $request->category;
        $data->description = $request->description;
        // $data->url = $request->url;
        $data->updated_at = Carbon::now();

        if ($request->file('small_image')) {
            if ($data->small_image == 'upload/no_image_3.jpg') {

            } else {
                @unlink($data->small_image);
            }
            $image = $request->file('small_image');
            $image_ex = $image->getClientOriginalExtension();
            $image_name = rand(000000,1000000).'.'.$image_ex;
            $save_url = "upload/portfolio/small_images/".$image_name;
            $image->move(public_path('upload/portfolio/small_images/'),$image_name);
            $data->small_image = $save_url;
        }
        if ($request->file('big_image')) {
            if ($data->big_image == 'upload/no_image_3.jpg') {

            } else {
                @unlink($data->big_image);
            }
            $image = $request->file('big_image');
            $image_ex = $image->getClientOriginalExtension();
            $image_name = rand(000000,1000000).'.'.$image_ex;
            $save_url = "upload/portfolio/big_images/".$image_name;
            $image->move(public_path('upload/portfolio/big_images/'),$image_name);
            $data->big_image = $save_url;
        }

        $data->save();
        $notification = [
            'alert-type' => 'success',
            'message' => 'Data Updated Successfully !',
        ];
        return redirect()->route('portfolio.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        @unlink($portfolio->small_image);
        @unlink($portfolio->big_image);
        $portfolio->delete();

        $notification = [
            'alert-type' => 'success',
            'message' => 'Data Deleted Successfully !',
        ];
        return redirect()->back()->with($notification);
    }
}