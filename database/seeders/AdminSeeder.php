<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 10; $i++){
            $gender = $faker->randomElement(['male', 'female']);
            DB::table('admins')->insert(
                [ // ADMIN
                'name' => $faker->name($gender),
                'email' => $faker->email,
                'password' => bcrypt('narendra'),
                'noHp' => $faker->phoneNumber,
                'jenisKelamin' => ($gender == 'male')?0:1,
                'alamat' => $faker->address,
                'created_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
                'updated_at' => date('Y-m-d H:i:s')
                ]
            );
        }
    }
}
