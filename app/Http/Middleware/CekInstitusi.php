<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekInstitusi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$institusis)
    {
        if (in_array($request->user()->institusi,$institusis)) {
            return $next($request);
        }
        return redirect('/');
    }
}
