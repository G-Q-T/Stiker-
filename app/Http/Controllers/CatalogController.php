<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\produk;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    //
    public function index() {}


    public function category(string $slug)
    {
        $category = category::with('produks')->Where('slug', $slug)->first();
        $produks = $category->produks()->paginate(10);
        return view('category.index', compact('produks', 'category'));
    }
}
