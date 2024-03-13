<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cashier;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);

        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10),
        ]);
        $adminUser->assignRole("admin");

        $cashierUser = User::create([
            'name' => 'Cashier',
            'email' => 'cashier@cashier.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'remember_token' => Str::random(10),
        ]);
        $cashierUser->assignRole("cashier");

        Store::create([
            'user_id' => '1',
            'name' => 'Capuds Store',
            'address' => 'Kuranji, Padang Timur, Padang, Sumatera Barat',
            'phone_number' => '081365851330'
        ]);

        $this->call(CashierSeeder::class);
        $this->call(TableSeeder::class);
        $this->call(MenuCategorySeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(MenuHistorySeeder::class);
        // $this->call(PaymentSeeder::class);
    }
}
