<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\produk;

class CatalogController extends Controller
{
    public function index()
    {
        //
    }

    public function category(string $slug)
    {
        $category = category::with('produks')
            ->where('slug', $slug)
            ->firstOrFail();

        $produks = $category->produks()->paginate(10);

        return view('category.index', compact('produks', 'category'));
    }

    public function produk(string $slug)
    {
        $produk = produk::with('images')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('produk.show', compact('produk'));
    }

    public function listing()
    {
        $produks = produk::with('category')->get();
        return view('produk.index', compact('produks'));
    }
}
