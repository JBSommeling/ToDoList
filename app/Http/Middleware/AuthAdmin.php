<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
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
        if ($request->route('user')) {
            $user = User::get_user(Auth::user()->id);
            if ($user[0]->id != 1) {
                return redirect('/');
            }
        }
        return $next($request);
    }
}
