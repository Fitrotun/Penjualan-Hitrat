<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethod::insert([
            [
                'nama_bank' => 'BRI',
                'nama_rek' => 'Fatimah Aqilah',
                'no_rek' => '033401077084501',
                'created_at'=> now(),
                'updated_at' => now(),
            ],
            [
                'nama_bank' => 'BSI',
                'nama_rek' => 'Fatimah Aqilah',
                'no_rek' => '8787992850',
                'created_at'=> now(),
                'updated_at' => now(),
            ],
            [
                'nama_bank' => 'Mandiri',
                'nama_rek' => 'Fatimah Aqilah',
                'no_rek' => '1850000436672',
                'created_at'=> now(),
                'updated_at' => now(),
            ],
            [
                'nama_bank' => 'BCA',
                'nama_rek' => 'Fatimah Aqilah',
                'no_rek' => '8175072060',
                'created_at'=> now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
