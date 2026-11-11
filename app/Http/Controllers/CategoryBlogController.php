<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Manajemen Kategori Blog";
        $categories = CategoryBlog::orderBy('id')->get();
        return view('admin.category_blog.index', compact('title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Tambah Category produk || PPKD Stiker";
        return view('admin.category_blog.create', compact('title'));
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
        ]);

        $datacategory['slug'] = $datacategory['slug'] ? Str::slug($datacategory['slug']) : Str::slug($datacategory['name']);
        CategoryBlog::create($datacategory);
        return redirect()->route('admin.category_blog.index')->with('succes', "kategori blog berhasil ditambahkan");
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
    public function edit(CategoryBlog $categoryBlog)
    {
        //
        $title = "Edit Category blog  || PPKD Stiker";
        return view('admin.category_blog.edit', compact('title', 'categoryBlog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $simpancategory, CategoryBlog $categoryBlog)
    {
        //
        $datacategory = $simpancategory->validate([
            'name' => 'required | string',
            'slug' => 'required | string|unique:categories,slug,' . $categoryBlog->id,

        ]);
        $datacategory['slug'] = $datacategory['slug'] ? Str::slug($datacategory['slug']) : Str::slug($datacategory['name']);
        $categoryBlog->update($datacategory);
        return redirect()->route('admin.category_blog.index')->with('succes', "kategori blog berhasil di update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = CategoryBlog::findOrFail($id);

        $category->delete();

        return redirect()
            ->route('admin.category_blog.index')
            ->with('succes', 'Kategori blog berhasil dihapus');
    }
}
