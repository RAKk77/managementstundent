<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceHttps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    protected $middleware = [
    // other middleware
    \App\Http\Middleware\ForceHttps::class,
];
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
