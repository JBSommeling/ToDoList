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
        $lists = Tasklist::get_lists_by_user(Auth::user()->id );
        return view('home', compact('lists'));
    }
}
