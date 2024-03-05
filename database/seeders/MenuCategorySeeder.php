<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            ['category_name' => 'Appetizer', 'type' => 'Food', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Main Course', 'type' => 'Food', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Dessert', 'type' => 'Food', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Coffee', 'type' => 'Drink', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Tea', 'type' => 'Drink', 'created_at' => now(), 'updated_at' => now()],
            ['category_name' => 'Milk', 'type' => 'Drink', 'created_at' => now(), 'updated_at' => now()]
        ];

        MenuCategory::insert($categories);
    }
}
