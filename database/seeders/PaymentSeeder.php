<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        Payment::insert([
            [
                'status' => 'completed',
                'merchant_order' => 1001,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status' => 'pending',
                'merchant_order' => 1002,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'status' => 'failed',
                'merchant_order' => 1003,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
