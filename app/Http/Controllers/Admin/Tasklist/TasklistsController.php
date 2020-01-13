<?php

namespace App\Http\Controllers\Admin\Tasklist;

use App\Http\Controllers\Controller;
use App\Tasklist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasklistsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($user_id){
        $lists = Tasklist::get_lists_by_user($user_id);
        return view('admin.tasklists.show', compact('lists'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($list_id)
    {
        $result = Tasklist::get_list_by_id($list_id);
        Tasklist::destroy($list_id);
        return redirect()->route('admin.tasklist.show', $result[0]->id);
    }

    public function load(){
        if (isset(Auth::user()->id)) {
            $user_id = Auth::user()->id;
        }
        else{
            $user_id = null;
        }
        $lists = Tasklist::get_lists_by_user($user_id);
        return view('tasklist/tasklist', compact('lists'));
    }
}
