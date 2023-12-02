<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        DB::table('admins')->insert(
            [ // ADMIN
            'name' => 'Ida Fitrotun',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'alamat' => $faker->address,
            'noHp' => '081333717238',
            'jenisKelamin' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]
        );
        DB::table('users')->insert(
            [ // USER
            'name' => 'Nanda Setiawan',
            'email' => 'user@gmail.com',
            'password' => bcrypt('56789'),
            'alamat' => $faker->address,
            'noHp' => '089526545324',
            'jenisKelamin' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]
        );
        
    }
}
