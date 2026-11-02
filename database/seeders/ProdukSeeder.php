<?php

namespace Database\Seeders;

use App\Models\produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $dataproduks = [[
            'category_id' => 1,
            'image' => null,
            'name' => 'kartu nama keren',
            'stock' => '10',
            'price' => 35000

        ], [
            'category_id' => 2,
            'image' => null,
            'name' => 'kartu nama kuno',
            'stock' => '10',
            'price' => 55000
        ]];


        foreach ($dataproduks as $insertdata)
            produk::create([
                'category_id' => $insertdata['category_id'],
                'image' => $insertdata['image'],
                'name' => $insertdata['name'],
                'stock' => $insertdata['stock'],
                'price' => $insertdata['price']
            ]);
    }
}
