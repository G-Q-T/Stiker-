<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //
    protected $fillable = ['produks_id', 'path', 'alt', 'sort_order'];


    public function product()
    {
        return $this->belongsTo(produk::class, 'produks_id', 'id');
    }
}
     