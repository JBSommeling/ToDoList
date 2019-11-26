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

    public static function destroy($ids)
    {
        return DB::table('tasklists')->where('list_id', '=', $ids)->delete();
    }
}
