@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="p-6 border rounded shadow">
        <h1 class="text-2xl font-bold mb-2">{{ $job->title }}</h1>
        <p class="text-gray-600 mb-1">{{ $job->company }} - {{ $job->location }}</p>
        <p class="text-gray-500 mb-4">Type: {{ $job->type }}</p>
        <div class="mb-4">{{ $job->description }}</div>
        <p class="text-sm text-gray-400">Posted by: {{ $job->user->name }} ({{ $job->user->email }})</p>
        <a href="{{ route('jobs.index') }}" class="text-blue-500 hover:underline mt-4 inline-block">Back to Listings</a>
    </div>
</div>
@endsection 