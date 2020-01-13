<?php

namespace App\Http\Controllers\Admin\Task;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index($user_id, $list_id){
        $tasks = Task::get_tasks_by_user_id_and_tasklist_id($user_id, $list_id);
        return view('admin.task.index', compact('tasks'));
    }

    public function show($task_id){
        $task = Task::get_task($task_id);
        return view('admin.task.show', compact('task'));
    }

    public function destroy($task_id, $user_id, $list_id){
        Task::destroy($task_id);
        return redirect()->route('admin.task.index', compact('user_id', 'list_id'));
    }
}
