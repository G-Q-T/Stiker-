<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $fillable = ['name', 'slug', 'icon', 'sort_order'];

    // m to one
    public function produks()
    {
        return $this->hasMany(produk::class);
    }
}

