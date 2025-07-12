<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeJobResource;
use App\Models\Job;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // $blogs = Job::latest()->get();
        $jobs = Job::when($request->search, function ($query) use ($request) {
            return $query->where('title', 'LIKE', "%{$request->search}%");
        })->latest()->get();

        return inertia()->render('Frontend/Home', [
            'jobs' => HomeJobResource::collection($jobs),
            'job_count' => number_format($jobs->count()),
            'searchQuery' => $request->search,
        ]);
    }
}
