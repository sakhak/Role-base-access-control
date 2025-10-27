<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Concerns\ApiResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->user()->user_level ===5 ) return $next($request);

         return response()->json([
            'message' => 'You do not have permission to access this resource!'
        ], 403);
    }
}
