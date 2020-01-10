<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tasklist extends Model
{
    public static function get_lists_by_user($user_id){
        $lists = DB::table('tasklists')
            ->where('user_id', $user_id)
            ->join('users', 'tasklists.user_id', '=', 'users.id')
            ->get();
        return $lists;
    }

    public static function get_list_by_id($id){
        $list = DB::table('tasklists')
            ->where('list_id', $id)
            ->join('users', 'tasklists.user_id', '=', 'users.id')
            ->get();
        return $list;
    }

    public static function create($list_name, $user_id){
        DB::table('tasklists')->insert(
            ['list_name' => $list_name, 'user_id' => $user_id]
        );
    }

    public static function destroy($ids){
        DB::table('tasks')->where('list_id', '=',$ids)->delete();
        return DB::table('tasklists')->where('list_id', '=', $ids)->delete();
    }

    public static function destroy_all_tasklists_by_user($user_id){
        DB::table('tasklists')->where('user_id', '=', $user_id)->delete();
    }

    public static function update_list($list_id, $list_name){
        DB::table('tasklists')
            ->where('list_id', $list_id)
            ->update(['list_name' => $list_name]);
    }

    public static function get_user_by_tasklist_id($id){
        DB::table('tasklists')
            ->where('list_id', $id)
            ->join('users', 'tasklists.user_id', '=', 'users.id')
            ->get();
    }
}
