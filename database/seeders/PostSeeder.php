<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Tenant;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('tenant_id', 1)->inRandomOrder()->first();

        if ($user) {
            Post::factory(10)->create([
                'tenant_id' => 1,
                'user_id'   => $user->id,
            ]);
        }
        // Create a few tenants
        Tenant::factory(3)->create()->each(function ($tenant) {
            // For each tenant, create a few users
            User::factory(2)->create([
                'tenant_id' => $tenant->id,
            ])->each(function ($user) use ($tenant) {
                // For each user, create some posts
                Post::factory(5)->create([
                    'tenant_id' => $tenant->id,
                    'user_id'   => $user->id,
                ]);
            });
        });
    }
}
