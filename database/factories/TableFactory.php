<?php

namespace Database\Factories;

use App\Models\Table;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Table>
 */
class TableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Table::class;

    private static $tableNumber = 1;

    public function definition(): array
    {
        return [
            'name' => 'Table' . self::$tableNumber++,
            'status' => $this->faker->randomElement(['Empty', 'Filled', 'Broken']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
