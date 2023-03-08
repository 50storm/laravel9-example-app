<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'last_name' => 'Test',
            'first_name' => 'User',
            'email' => 'testuser@example.com',
            'post_code' => fake()->unique()->postcode(),
            'address_prefecture' => fake()->prefecture(),
            'address_city' => fake()->city(),
            'address_street_address' => fake()->streetAddress(),
            'address_building_number' =>'ビル名 ' . fake()->buildingNumber(),
            'phone_number' => fake()->unique()->phoneNumber(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
