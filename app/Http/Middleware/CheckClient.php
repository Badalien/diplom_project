<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Auth;

class CheckClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user->role != User::ADMIN_ROLE) {
            return redirect('/');
        }

        return $next($request);
    }
}
