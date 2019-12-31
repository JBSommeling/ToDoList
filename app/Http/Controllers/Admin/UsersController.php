<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Task;
use App\Tasklist;
use App\User;
use App\Role;
use Gate;
use Illuminate\Http\Request;

class UsersController extends Controller
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
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show($user_id){
        $lists = Tasklist::get_lists_by_user($user_id);
        return view('admin.users.show', compact('lists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Gate::denies('edit-users')){
            return redirect(route('admin.user.index'));
        }
        $roles = Role::all();

        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles); //to attach it to the user-roles relationship
        return redirect()->route('admin.user.index');
    }


    public function destroy(User $user)
    {

        if(Gate::denies('delete-users')){
            return redirect(route('admin.user.index'));
        }

        $user->roles()->detach(); // removes all roles from the given user
        Tasklist::destroy_all_tasklists_by_user($user->id);
        Task::destroy_all_tasks_by_user($user->id);
        $user->delete();

        return redirect('/admin/user');
    }
}
