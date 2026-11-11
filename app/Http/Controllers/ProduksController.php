<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
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
        // $datacategory = category::with('produks')->orderBy('id', 'DESC')->count();
        return view('admin.produk.index', compact('title', 'dataproduks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataproduk = category::get();
        $title = "create produk";
        //
        return view('admin.produk.create', compact('title', 'dataproduk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $apakek)
    {
        // 1. Validasi data
        $data = $apakek->validate([
            'category_id' => 'required|exists:categories,id',

            'name' => 'required|string|max:60',
            'slug' => 'nullable|string|unique:produks,slug',
            'price' => 'required|integer',

            'price_art_carton' => 'nullable|integer',
            'price_art_paper' => 'nullable|integer',
            'price_art_hvs' => 'nullable|integer',
            'price_Doft' => 'nullable|integer',
            'price_glossy' => 'nullable|integer',
            'cutting_price' => 'nullable|integer',

            'description' => 'nullable|string',
            'brief_description' => 'nullable|string',

            'images' => 'required|array|min:1',
            'images.*' => 'required|image|mimes:png,jpg,jpeg,gif|max:2048',

            'alt' => 'nullable|array',
            'alt.*' => 'nullable|string|max:255',

            'sort_order' => 'nullable|integer',
        ]);

        // 2. Transaksi database
        DB::transaction(function () use ($data) {
        
            // Simpan data produk
            $product = produk::create([
                'category_id' => $data['category_id'],
                'name' => $data['name'],
                'slug' => $data['slug'] ?? null,
                'price' => $data['price'],

                'price_art_carton' => $data['price_art_carton'] ?? null,
                'price_art_paper' => $data['price_art_paper'] ?? null,
                'price_art_hvs' => $data['price_art_hvs'] ?? null,
                'price_Doft' => $data['price_Doft'] ?? null,
                'price_glossy' => $data['price_glossy'] ?? null,
                'cutting_price' => $data['cutting_price'] ?? null,

                'description' => $data['description'] ?? null,
                'brief_description' => $data['brief_description'] ?? null,
            ]);

            // 3. Simpan banyak gambar
            $imagedata = [];

            foreach ($data['images'] as $key => $file) {

                $path = $file->store('imagesproduks', 'public');

                // Gambar pertama menjadi gambar utama
                if ($key === array_key_first($data['images'])) {
                    $product->update([
                        'image' => $path,
                    ]);
                }

                // Siapkan data gambar galeri
                $imagedata[] = [
                    'path' => $path,
                    'alt' => $data['alt'][$key] ?? $product->name,
                    'sort_order' => $key + 1,
                ];
            }

            // 4. Simpan seluruh gambar ke tabel product_images
            $product->images()->createMany($imagedata);
        });

        // 5. Redirect
        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Data produk berhasil ditambahkan');
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
    public function edit(produk $itemproduk)
    {
        //
        $title = "Edit data produk";
        return view('admin.produk.edit', compact('title', 'itemproduk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $apakek, produk $itemproduk)
    {
        //
        if ($apakek->hasFile('image')) {
            # code...
            if ($itemproduk->image) {
                # code...
                Storage::disk('public')->delete($itemproduk->image);
            }
            $aslikah['image'] = $itemproduk->file('image')->store('imageproduks', 'public');
        }
        $dataproduk = $apakek->validate([
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:2048',
            'name' => 'string|required|max:60',
            'slug' => 'nullable|string|unique:produks,slug',
            'price' => 'required|integer',
            'price_art_carton' => 'nullable|integer',
            'price_art_paper' => 'nullable|integer',
            'price_art_hvs' => 'nullable|integer',
            'price_Doft' => 'nullable|integer',
            'price_glossy' => 'nullable|integer',
            'cutting_price' => 'nullable|integer',
            'description' => 'nullable|text',
            'brief_description' => 'nullable|text'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $dataproduk = produk::find($id);

        if ($dataproduk->image) {
            # code...
            Storage::disk('public')->delete($dataproduk->image);
        }
        $dataproduk->delete();
        return redirect()->route('admin.produk.index')->with('succes', " produk berhasil di hapus");
    }
}
