<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title'      => $this->faker->sentence,
            'body'       => $this->faker->paragraphs(3, true),
            'tenant_id'  => Tenant::factory(), // creates tenant and assigns ID
            'user_id'    => User::factory(),   // creates user and assigns ID
        ];
    }
}