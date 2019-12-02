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
}
