<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    //
    protected $fillable = ['category_id', 'image', 'name', 'stock', 'price'];

    // M to One

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
