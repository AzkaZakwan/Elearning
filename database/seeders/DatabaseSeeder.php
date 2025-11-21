<?php

namespace Database\Seeders;


use App\Models\Warga;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Warga::factory()->create([
            'nama'  => 'admin',
            'email' => 'admin@gmail.com',
            'role'  => 'admin',
            'password'    => bcrypt('randomAdmin1')
        ]);
    }
}
