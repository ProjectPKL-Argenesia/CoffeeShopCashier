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
            ['category_name' => 'Appetizer', 'type' => 'Food'],
            ['category_name' => 'Main Course', 'type' => 'Food'],
            ['category_name' => 'Dessert', 'type' => 'Food'],
            ['category_name' => 'Coffee', 'type' => 'Drink'],
            ['category_name' => 'Tea', 'type' => 'Drink'],
            ['category_name' => 'Milk', 'type' => 'Drink']
        ];

        MenuCategory::insert($categories);
    }
}
