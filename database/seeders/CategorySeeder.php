<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            'Buket Bunga',
            'Bunga Meja',
        ])->each(function ($v) {
            Category::query()->create([
                'text' => $v,
                'slug' => Str::slug($v),
            ]);
        });
    }
}
