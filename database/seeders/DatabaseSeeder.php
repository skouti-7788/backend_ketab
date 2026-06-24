<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. قم بتعطيل هذا السطر (السطر رقم 20 الذي يسبب الخطأ)
        // User::factory()->create([...]); 

        // 2. إذا كنت تريد إنشاء مستخدم تجريبي، افعل ذلك يدوياً بالأعمدة الصحيحة:
        // User::create([
        //     'username' => 'Admin',
        //     'email' => 'admin@example.com',
        //     'password' => bcrypt('password123'),
        // ]);

        // 3. استدعاء Seeder الكتب (الـ 50 كتاباً)
        $this->call([
            LivreSeeder::class,
            AdherentsSeeder::class,
            OpinionSeeder::class,
            DescriptionSeeder::class,

        ]);
    }
}