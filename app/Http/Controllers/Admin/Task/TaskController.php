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
}
