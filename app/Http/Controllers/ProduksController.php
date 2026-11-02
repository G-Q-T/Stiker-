<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProduksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "manajemen Produk";
        $dataproduks = produk::with('category')->orderBy('id', 'DESC')->get();
        return view('admin.produk.index', compact('title', 'dataproduks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datacategory = category::all();
        $title = "create produk";
        //
        return view('admin.produk.create', compact('title', 'datacategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $apakek)
    {
        //

        $apakek->validate([
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:2048',
            'name' => 'string|required|max:60',
            'stock' => 'required|integer',
            'price' => 'required|integer'
        ]);

        $pathImage = null;

        if ($apakek->image) {
            # code...
            $pathImage = $apakek->file('image')->store('imageproduks', 'public');
        }
        produk::create([
            'category_id' => $apakek->category_id,
            'image' => $pathImage,
            'name' => $apakek->name,
            'stock' => $apakek->stock,
            'price' => $apakek->price,
        ]);
        return redirect()->route('admin.produk.index')->with('succes', 'data produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
