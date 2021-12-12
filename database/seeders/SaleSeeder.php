<?php

namespace Database\Seeders;

use App\Models\Sale;
use Illuminate\Database\Seeder;
use Unicodeveloper\Paystack\Facades\Paystack;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sale::create([
            'buyer' => 'Favour Mind',
            'reference' => Paystack::genTranxRef(),
            'ticket_id' => 1,
            'seat_number' => 1
        ]);
    }
}
