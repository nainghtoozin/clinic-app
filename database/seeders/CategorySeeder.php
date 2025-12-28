<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Medicines',
            'Medical Equipment',
            'Health Supplements',
            'Personal Care',
            'Baby Care',
        ];

        foreach ($categories as $name) {
            Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $name . ' products',
                'is_active' => true,
            ]);
        }
    }
}
