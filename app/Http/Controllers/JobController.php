<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\JobResource;

class JobController extends Controller
{
    public function index()
    {
        return JobResource::collection(Job::with('user')->paginate(10));
    }

    public function show($id)
    {
        $job = Job::with('user')->findOrFail($id);
        return new JobResource($job);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $validated['user_id'] = Auth::id();
        $job = Job::create($validated);
        return new JobResource($job);
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        // $this->authorize('update', $job);
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'company' => 'sometimes|required|string|max:255',
            'location' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
        ]);
        $job->update($validated);
        return new JobResource($job);
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        // $this->authorize('delete', $job);
        $job->delete();
        return response()->json(['message' => 'Job deleted successfully']);
    }
}
