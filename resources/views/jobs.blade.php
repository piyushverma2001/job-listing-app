@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Job Listings</h1>
    <div class="grid gap-4">
        @foreach ($jobs as $job)
            <div class="p-4 border rounded shadow">
                <h2 class="text-xl font-semibold">{{ $job->title }}</h2>
                <p class="text-gray-600">{{ $job->company }} - {{ $job->location }}</p>
                <p class="text-gray-500">Type: {{ $job->type }}</p>
                <a href="{{ route('jobs.show', $job->id) }}" class="text-blue-500 hover:underline">View Details</a>
            </div>
        @endforeach
    </div>
    <div class="mt-6">
        {{ $jobs->links() }}
    </div>
</div>
@endsection