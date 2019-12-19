<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    public static function get_tasks_by_user_id_and_tasklist_id($user_id, $list_id){
        $tasks = DB::select("SELECT * FROM `tasks` LEFT JOIN users ON tasks.user_id = tasks.user_id WHERE users.id = ? && list_id = ?", [$user_id, $list_id]);
        return $tasks;
    }

    public static function get_task($id){
        $task = DB::table('tasks')
            ->where('task_id', '=', $id)
            ->leftJoin('users', 'users.id','=','tasks.user_id')
            ->get();
        return $task;
    }

    public static function updateTask($id, $task_name, $task_description, $is_done){
        $task = DB::table('tasks')
            ->where('task_id', $id)
            ->update(['task_name' => $task_name, 'task_description' => $task_description, "is_done" => $is_done]);
    }

    public static function store($task_name, $user_id, $list_id, $task_description){
        $task = DB::table('tasks')->insert(
            ['task_name' => $task_name, 'user_id' => $user_id, 'list_id' => $list_id, 'task_description' => $task_description]
        );
    }

    public static function destroy($ids)
    {
        return DB::table('tasks')->where('task_id', '=', $ids)->delete();
    }


}
