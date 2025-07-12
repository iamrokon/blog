<?php

namespace App\Http\Controllers\Admin;

use App\Enums\EmploymentType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Http\Resources\Admin\JobResource;
use App\Http\Resources\EmploymentTypeResource;
use App\Models\Job;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->get();
        return inertia('Admin/Blogs/Index', [
            'jobs' => JobResource::collection($jobs),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Admin/Blogs/Create',[
            'employmentTypes' => EmploymentTypeResource::collection(EmploymentType::cases()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        $job = Job::create($request->validated());
        return to_route('admin.blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return inertia('Admin/Blogs/Show', [
            'job' => new JobResource($job),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($job)
    {
        $job = Job::findOrFail($job);
        return inertia('Admin/Blogs/Edit', [
            'employmentTypes' => EmploymentTypeResource::collection(EmploymentType::cases()),
            'job' => new JobResource($job),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        $job->updateOrFail($request->validated());
        return redirect()->route('admin.blogs.index')->with('success', 'Job updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->deleteOrFail();
        return redirect()->route('admin.blogs.index')->with('success', 'Job deleted successfully');
    }
}
