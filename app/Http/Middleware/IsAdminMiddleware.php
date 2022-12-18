<?php

namespace App\Http\Middleware;

use App\Enums\UserPermitionEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        if (Auth::user()->permition !== UserPermitionEnum::ADMIN) {
            return redirect('dashboard')->with('message', 'You no have acces..');
        }
        return $next($request);
    }
}
