<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Tenant::factory()->create([
            'name' => 'Test Tenant',
            'domain' => '127.0.0.1',
        ]);
        $this->call([
            UserSeeder::class,
            PostSeeder::class,
        ]);
    }
}
