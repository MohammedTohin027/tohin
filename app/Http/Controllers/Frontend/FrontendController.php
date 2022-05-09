<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Main;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //  index
    public function index()
    {
        $main = Main::first();
        $services = Service::where('status', 1)->orderBy('id', 'desc')->get();
        $portfolios = Portfolio::where('status', 1)->orderBy('id', 'desc')->get();
        $abouts= About::where('status', 1)->orderBy('id', 'asc')->get();
        return view('layouts.frontend_layout', compact('main', 'services', 'portfolios', 'abouts'));
    }
}