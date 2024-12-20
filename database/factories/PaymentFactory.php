<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Payment::class;

    public function definition(): array
    {
        $today = date('Y-m-d H:i:s');

        return [
            'store_id' => '1',
            'cashier_id' => '1',
            'order_id' => '1',
            'date_payment' => $today,
            'total_price' => 17000,
            'type_payment' => 'cash',
            'discount' => '11',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
