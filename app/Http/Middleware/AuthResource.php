<?php

namespace App\Http\Middleware;

use App\Task;
use App\Tasklist;
use App\User;
use Illuminate\Support\Facades\Auth;
use Closure;

class AuthResource
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
        if ($request->route('user_id')) {
            $user= User::get_user($request->route('user_id'));
            if ($user[0]->id != Auth::user()->id) {
                return redirect('/');
            }
        }
        if ($request->route('tasklist')) {
            $tasklist= Tasklist::get_list_by_id($request->route('tasklist'));
            if ($tasklist[0]->user_id != Auth::user()->id) {
                return redirect('/');
            }
        }
        return $next($request);
    }
}
