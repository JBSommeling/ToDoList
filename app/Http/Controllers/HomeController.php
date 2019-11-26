<?php

namespace App\Http\Controllers;

use App\Tasklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (isset(Auth::user()->id)) {
            $user_id = Auth::user()->id;
        }
        else{
            $user_id = null;
        }
        $lists = Tasklist::get_lists_by_user($user_id);
        return view('home', compact('lists'));
    }
}
