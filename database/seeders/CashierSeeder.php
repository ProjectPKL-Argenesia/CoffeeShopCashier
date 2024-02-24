<?php

namespace Database\Seeders;

use App\Models\Cashier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CashierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cashiers = [
            [
                'user_id' => '2',
                'name' => 'Bambang',
                'gender' => 'Male',
            ]
        ];

        Cashier::insert($cashiers);
    }
}
