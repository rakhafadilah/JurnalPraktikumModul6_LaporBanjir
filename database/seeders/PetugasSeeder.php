<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {

        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 6; $i++) {
            DB::table('users')->insert([
                'name'       => $faker->name,
                'email'      => $faker->unique()->safeEmail,
                'password'   => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::table('users')->updateOrInsert(
            ['email' => 'admin@bpbd.test'],
            [
                'name'       => 'Admin BPBD Kabupaten Bandung',
                'password'   => Hash::make('admin123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}