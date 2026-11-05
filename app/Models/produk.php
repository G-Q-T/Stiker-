<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    //
    protected $fillable = [
        'category_id',
        'image',
        'name',
        'slug',
        'stock',
        'price',
        'price_art_carton',
        'price_art_paper',
        'price_art_hvs',
        'price_Doft',
        'price_glossy',
        'cutting_price',
        'description',
        'brief_description',
    ];



    // M to One
    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
