<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filepath = storage_path('data/categories.php');
        require $filepath;
        $categoriesData = [];
        foreach ($categories as $category) {
            $categoriesData[] = [
                'name' => $category['name'],
                'is_active' => 1,
            ];
        }
        Category::query()->insert($categoriesData);
    }
}
