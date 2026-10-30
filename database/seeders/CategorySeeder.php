<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datacategory = [

            [
                'name' => 'Digital printing',
                'slug' => 'Digital-printing',
                'icon' => 'bi bi-printer',
                'sort_order' => '1',
            ],

            [
                'name' => 'Name Card',
                'slug' => 'Name-Card',
                'icon' => 'bi bi-person-badge',
                'sort_order' => '2',
            ],

            [
                'name' => 'Sticker',
                'slug' => 'Sticker',
                'icon' => 'bi bi-tag',
                'sort_order' => '3',
            ],

            [
                'name' => 'Display Promotion',
                'slug' => 'Display-Promotion',
                'icon' => 'bi bi-easel',
                'sort_order' => '4',
            ],

            [
                'name' => 'Large Format',
                'slug' => 'Large-Format',
                'icon' => 'bi bi-signpost-2',
                'sort_order' => '5',
            ],

            [
                'name' => 'Merchandise',
                'slug' => 'Merchandise',
                'icon' => 'bi bi-cup-hot',
                'sort_order' => '6',
            ],
        ];
        foreach ($datacategory as $alldatacategory) {
            category::updateOrCreate(['slug' => $alldatacategory['slug']], $alldatacategory);
        }
    }
}
