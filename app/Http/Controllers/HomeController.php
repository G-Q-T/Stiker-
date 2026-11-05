<?php

namespace App\Providers;

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class HomeController extends Controller
{
    public function index()
    {
        $datacategory = category::get();
        return view('home.index', compact('datacategory'));
    }
}
