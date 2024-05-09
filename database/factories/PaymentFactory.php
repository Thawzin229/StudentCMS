<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'acc_name' => 'Hein Zaw',
            'acc_number' => '239573928770293',
            'payment_method' => 'KBZ',
            'status' => 'active',
        ];
    }
}
