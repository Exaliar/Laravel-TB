<?php

namespace Database\Seeders;

use App\Config\UserPermitionConfig;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'User',
            'surname' => 'Admin',
            'email' => 'user@example.com',
            'permition' => UserPermitionConfig::ADMIN,
        ]);
    }
}
