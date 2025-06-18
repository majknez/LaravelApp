<?php

namespace Database\Factories;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
{
    protected $model = Inventory::class;

    protected static ?string $user_id;
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'quantity' => $this->faker->numberBetween(1, 100),
            'unit' => $this->faker->randomElement(['kg', 'pcs', 'liters']),
            'user_id' => static::$user_id ??= $this->faker->numberBetween(1, 10),
        ];
    }
}
