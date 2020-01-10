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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user_id = $request->user_id;
        $list_name = $request->list_name;

        $validatedData = $request->validate([
            'list_name' => 'required'
        ],
            [
                'list_name.required' => 'U moet een naam invoeren'
            ]);

        if ($validatedData){
            Tasklist::create($list_name, $user_id);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($list_id)
    {
        $tasklist = Tasklist::get_list_by_id($list_id);
        return view('tasklist/edit', compact('tasklist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $list_name = $request->edit_list_name;
        $validatedData = $request->validate([
            'edit_list_name' => 'required'
        ],
            [
                'edit_list_name.required' => 'U moet een naam invoeren'
            ]);

        if ($validatedData) {
            Tasklist::update_list($id, $list_name);
            $feedback = 'edit_name_success';
            return redirect()->route('home', compact('feedback'));
        }
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
        return redirect()->route('admin.user.show', $result[0]->id);
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
