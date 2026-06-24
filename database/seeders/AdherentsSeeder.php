<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AdherentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $faker = Faker::create('fr_FR');

    // تعطيل foreign keys
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    // مسح البيانات
    DB::table('adherents')->delete();

    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    $existingUser = DB::table('users')->first();

    if ($existingUser) {
          ;
    DB::table('adherents')->insert([
            'nom'    => $existingUser->username,
            'email'  => $existingUser->email,
            'phone'  => '0600000000',
            'datadahestion' => $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'status' => $faker->randomElement(['active', 'inactive']),
            'user_id'=> $existingUser->id
        ]);
    // for ($i = 0; $i < 10; $i++) {
    //     DB::table('adherents')->insert([
    //         'nom'    => $faker->name,
    //         'email'  => $faker->unique()->safeEmail,
    //         'phone'  => $faker->phoneNumber,
    //         'datadahestion' => $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
    //         'status' => $faker->randomElement(['active', 'inactive']),
    //         'user_id'=> $userId
    //     ]);
    // }
    }  
}
    
}
