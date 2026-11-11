<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Manajemen Kategori Produk";
        $categories = category::orderBy('sort_order')->get();
        return view('admin.category.index', compact('title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Tambah Category produk || PPKD Stiker";
        return view('admin.category.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // store category
    public function store(Request $simpancategory)
    {
        //
        $datacategory = $simpancategory->validate([
            'name' => 'required|string',
            'slug' => 'nullable|string|unique:categories,slug',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'icon' => 'nullable|string',
        ]);

        $datacategory['slug'] = $datacategory['slug'] ? Str::slug($datacategory['slug']) : Str::slug($datacategory['name']);
        $datacategory['sort_order'] = $datacategory['sort_order'] ?? 0;
        category::create($datacategory);
        return redirect()->route('admin.category.index')->with('succes', "kategori produk berhasil ditambahkan");
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
    public function edit(category $category)
    {
        //
        $title = "Edit Category produk || PPKD Stiker";
        return view('admin.category.edit', compact('title', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $simpancategory, category $category)
    {
        //
        $datacategory = $simpancategory->validate([
            'name' => 'required | string',
            'slug' => 'required | string|unique:categories,slug,' . $category->id,
            'description' => 'nullable | string',
            'sort_order' => 'nullable | integer',
            'icon' => 'nullable |string',
        ]);
        $datacategory['slug'] = $datacategory['slug'] ? Str::slug($datacategory['slug']) : Str::slug($datacategory['name']);
        $datacategory['sort_order'] = $datacategory['sort_order'] ?? 0;
        $category->
        update($datacategory);
        return redirect()->route('admin.category.index')->with('succes', "kategori produk berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        //
        $category->delete();
        return redirect()->route('admin.category.index')->with('succes', "kategori produk berhasil di hapus");
    }
}
