<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id, $list_id)
    {
        $tasks = Task::get_tasks_by_user_id_and_tasklist_id($user_id, $list_id);
        $btn = Task::get_tasks_by_user_id_and_tasklist_id($user_id, $list_id);
        return view('/task/index', compact('tasks', 'list_id', 'btn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = $request->user_id;
        $task_name = $request->task_name;
        $list_id = $request->list_id;
        $task_description = $request->task_description;

        $validatedData = $request->validate([  'task_name' => 'required']);

        if ($validatedData){
            Task::store($task_name, $user_id, $list_id, $task_description);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::get_task($id);
        return view('task.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::get_task($id);
        return view('task.edit', compact('task'));
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
        $task_name = $request->edit_task_name;
        $task_description = $request->edit_task_description;

        if ($request->edit_is_done != null){
            $is_done = 1;
        }
        else{
            $is_done = 0;
        }


        $validatedData = $request->validate([
            'edit_task_name' => 'required'
        ],
            [
                'edit_task_name.required' => 'U moet een naam invoeren'
            ]);

        if ($validatedData){
            Task::updateTask($id, $task_name, $task_description, $is_done);
            return redirect('/task/index/'.$request->user_id.'/'.$request->list_id);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $user_id, $list_id)
    {
        Task::destroy($id);
        return redirect()->route('task.index', compact('user_id', 'list_id'));
    }

    public function load($list_id){
        if (isset(Auth::user()->id)) {
            $user_id = Auth::user()->id;
            $tasks = Task::get_tasks_by_user_id_and_tasklist_id($user_id, $list_id);
        }
        else{
            $user_id = null;
            $lists = null;
        }

       return view('task/list', compact('tasks'));
    }

    public function sort($user_id, $list_id, $sort){
        if ($sort == 'complete') {
            $tasks = Task::get_tasks_by_user_id_and_tasklist_id_ORDERBY_complete($user_id, $list_id);
            $btn = Task::get_tasks_by_user_id_and_tasklist_id($user_id, $list_id);
            return view('/task/index', compact('tasks', 'list_id', 'btn'));
        }
        elseif ($sort == 'incomplete'){
            $tasks = Task::get_tasks_by_user_id_and_tasklist_id_ORDERBY_incomplete($user_id, $list_id);
            $btn = Task::get_tasks_by_user_id_and_tasklist_id($user_id, $list_id);
            return view('/task/index', compact('tasks', 'list_id', 'btn'));
        }
        elseif ($sort == 'filter_complete'){
            $tasks = Task::get_tasks_by_user_id_and_tasklist_id_filter_by_is_done($user_id, $list_id, 1);
            $btn = Task::get_tasks_by_user_id_and_tasklist_id($user_id, $list_id);
            return view('/task/index', compact('tasks', 'list_id', 'btn'));
        }
        elseif ($sort == 'filter_incomplete'){
            $tasks = Task::get_tasks_by_user_id_and_tasklist_id_filter_by_is_done($user_id, $list_id, 0);
            $btn = Task::get_tasks_by_user_id_and_tasklist_id($user_id, $list_id);
            return view('/task/index', compact('tasks', 'list_id', 'btn'));
        }
    }
}
