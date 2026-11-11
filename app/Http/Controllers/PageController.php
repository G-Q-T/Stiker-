<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\CategoryBlog;
use App\Models\Setting;
use Illuminate\Http\Request;


class PageController extends Controller
{
    //
    public function FAQ()
    {
        $title = "ini halaman FAQ";

        return view('faq.index', compact('title'));
    }

    public function contact()
    {
        $setting = Setting::get();
        return view('contact.index', compact('setting'));
    }

    public function Blog(Request $request)
    {
        $categories = CategoryBlog::withCount('blogs')->get();
        $totalBlogCount = blog::count();
        // $blogs = blog::with('categoryBlog')->orderBy('id', 'desc')->get();
        $blogs = blog::with('categoryBlog')->latest();

        if ($request->filled('categoryBlog')) {
            # code...
            $blogs->whereHas('categoryBlog', function ($q) use ($request) {
                $q->where('name', $request->categoryBlog);
            });
        }

        if ($request->filled('search')) {
            # code...
            $searchTerm = $request->search;
            $blogs->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")->orwhere('brief_description', 'like', "%{$searchTerm}%")->orwhere('content', 'like', "%{$searchTerm}%");
            });
        }
        $featuredPost = null;
        if (!$request->filled('categoryBlog' && !$request->filled('search'))) {
            # code...
            $featuredPost = (clone $blogs)->first();
        }
        if ($featuredPost) {
            # code...
            $blogs->where('id', '!=', $featuredPost->id);
        }
        $blogs = $blogs->paginate(9)->withQueryString();
        return view('blog.index', compact('blogs', 'categories', 'totalBlogCount', 'featuredPost'));
    }

    public function showblog(string $slug)
    {
        $blog = blog::where('slug', $slug)->with('categoryBlog')->first();

        return view('blog.show', compact('blog'));
    }
}
