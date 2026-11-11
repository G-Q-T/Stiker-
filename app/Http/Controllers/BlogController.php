<?php

namespace App\Http\Controllers;

use App\Models\CategoryBlog;
use App\Models\blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "manajemen blog";
        $blogs = blog::with('categoryBlog')->orderBy('id', 'DESC')->get();
        // $datacategory = category::with('produks')->orderBy('id', 'DESC')->count();
        return view('admin.blog.index', compact('title', 'blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogs = CategoryBlog::all();
        $title = "create produk";
        //
        return view('admin.blog.create', compact('title', 'blogs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $apakek)
    {
        // 1. Validasi data
        $data = $apakek->validate([
            'name' => 'required|string',
            'blog_category_id' => 'required|exists:category_blogs,id',
            'slug' => 'nullable|string|unique:produks,slug',
            'content' => 'nullable|string',
            'brief_description' => 'nullable|string',
            'author' => 'nullable|string',
            'cover_path' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:2048',

        ]);

        if ($apakek->hasFile('cover_path')) {
            # code...
            $data['cover_path'] = $apakek->file('cover_path')->store('blogs', 'public');
        }
        $data['slug'] = $data['slug'] ? Str::slug($data['slug']) : Str::slug($data['name']);

        blog::create($data);
        // 5. Redirect
        return redirect()
            ->route('admin.blog.index')
            ->with('succes', 'Data blog berhasil ditambahkan');
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
    public function edit(blog $blog)
    {
        //
        $title = "Edit Blog";
        $categoriesBlog = CategoryBlog::all();
        return view('admin.blog.edit', compact('title', 'blog', 'categoriesBlog'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $apakek, blog $blog)
    {
        // 1. Validasi data
        $data = $apakek->validate([
            'name' => 'required|string|max:255',

            'blog_category_id' => 'required|exists:category_blogs,id',

            'slug' => 'nullable|string|unique:blogs,slug,' . $blog->id,

            'content' => 'nullable|string',

            'brief_description' => 'nullable|string',

            'author' => 'nullable|string',

            'cover_path' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:2048',
        ]);

        // 2. Mengelola upload cover baru
        if ($apakek->hasFile('cover_path')) {

            // Hapus cover lama jika tersedia
            if ($blog->cover_path) {
                Storage::disk('public')->delete($blog->cover_path);
            }

            // Simpan cover baru
            $data['cover_path'] = $apakek->file('cover_path')
                ->store('blogs', 'public');
        }

        // 3. Membuat slug otomatis
        $data['slug'] = !empty($data['slug'])
            ? Str::slug($data['slug'])
            : Str::slug($data['name']);

        // 4. Update data blog
        $blog->update($data);

        // 5. Redirect
        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Data blog berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $blog = blog::find($id);

        if ($blog->cover_path) {
            # code...
            Storage::disk('public')->delete($blog->image);
        }
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('succes', " blog berhasil di hapus");
    }
}
