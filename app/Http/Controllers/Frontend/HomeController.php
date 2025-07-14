<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeJobResource;
use App\Http\Resources\HomePostResource;
use App\Models\Job;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $posts = Post::when($request->search, function ($query) use ($request) {
            return $query->where('title', 'LIKE', "%{$request->search}%");
        })->latest()->get();

        return inertia()->render('Frontend/Home', [
            'posts' => HomePostResource::collection($posts),
            'post_count' => number_format($posts->count()),
            'searchQuery' => $request->search,
        ]);
    }
}
