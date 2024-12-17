<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'name' => 'Britney',
                'description' => 'Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet',
                'price' => 1000000,
                'keyword' => 'britney, bunga britney, buket bunga',
                'category_id' => 1,
            ],
            [
                'name' => 'Eloise',
                'description' => 'Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet',
                'price' => 1200000,
                'keyword' => 'eloise, bunga eloise, buket bunga',
                'category_id' => 1,
            ],
            [
                'name' => 'Estella',
                'description' => 'Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet',
                'price' => 2000000,
                'keyword' => 'estella, bunga estella, buket bunga',
                'category_id' => 1,
            ],
            [
                'name' => 'Jasmine',
                'description' => 'Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet',
                'price' => 2000000,
                'keyword' => 'jasmine, bunga jasmine, bunga meja',
                'category_id' => 2,
            ],
            [
                'name' => 'Margareth',
                'description' => 'Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet',
                'price' => 320000,
                'keyword' => 'margareth, bunga margareth, bunga meja',
                'category_id' => 2,
            ],
            [
                'name' => 'Monroe',
                'description' => 'Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet',
                'price' => 320000,
                'keyword' => 'monroe, bunga monroe, bunga meja',
                'category_id' => 2,
            ],
        ])->each(function ($v) {
            $slug = Str::slug($v['name']);
            Product::query()->create([
                'name' => $v['name'],
                'description' => $v['description'],
                'slug' => $slug,
                'price' => $v['price'],
                'image' => "products/{$slug}.webp",
                'keyword' => $v['keyword'],
                'category_id' => $v['category_id'],
            ])->Types()->create([
                'name' => 'Hitam',
                'image' => "products/{$slug}.webp",
                'price' => $v['price'] - 10000,
            ]);
        });
    }
}
