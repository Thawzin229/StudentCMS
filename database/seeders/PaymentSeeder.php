<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        # payment_id (1) is COD
        Payment::factory()->create([
            'acc_name' => null,
            'acc_number' => null,
            'payment_method' => 'COD',
            'status' => 'active',
            'is_COD' => true,
        ]);

        Payment::factory()->create([
            'acc_number' => '200300400500600',
            'payment_method' => 'AYA Bank',
        ]);

        Payment::factory()->create([
            'acc_number' => '202303404505606',
            'payment_method' => 'A Bank',
        ]);

        Payment::factory()->create([
            'acc_number' => '111222333444555',
            'payment_method' => 'MOB Bank',
        ]);

        Payment::factory()->create([
            'acc_number' => '0002000030004003',
            'payment_method' => 'KBZ Bank',
        ]);
    }
}
