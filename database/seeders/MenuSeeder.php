<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $menus = [
            [
                'menu_category_id' => '1',
                'menu_name' => 'Bakwan',
                'type' => 'Food',
                'image' => 'image-post/bakwan.png',
                'price' => '1000',
                'stock' => '50',
                'tax' => '0.11',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_category_id' => '2',
                'menu_name' => 'Ayam Geprek',
                'type' => 'Food',
                'image' => 'image-post/geprek.png',
                'price' => '24000',
                'stock' => '30',
                'tax' => '0.11',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_category_id' => '3',
                'menu_name' => 'Pudding',
                'type' => 'Food',
                'image' => 'image-post/pudding.png',
                'price' => '10000',
                'stock' => '45',
                'tax' => '0.11',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_category_id' => '4',
                'menu_name' => 'Coffee',
                'type' => 'Drink',
                'image' => 'image-post/coffee.png',
                'price' => '10000',
                'stock' => '70',
                'tax' => '0.11',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_category_id' => '5',
                'menu_name' => 'Iced Tea',
                'type' => 'Drink',
                'image' => 'image-post/iced_tea.png',
                'price' => '5000',
                'stock' => '40',
                'tax' => '0.11',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'menu_category_id' => '6',
                'menu_name' => 'Oreo Milkshake',
                'type' => 'Drink',
                'image' => 'image-post/oreo_milkshake.png',
                'price' => '12000',
                'stock' => '30',
                'tax' => '0.11',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        Menu::insert($menus);
    }
}
