<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;

class IsJobOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $jobId = $request->route('id');
        $job = Job::find($jobId);
        if (! $job || $job->user_id !== Auth::id()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }
        return $next($request);
    }
}
