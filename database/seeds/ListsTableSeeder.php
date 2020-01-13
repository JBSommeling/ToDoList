<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Tasklist;

class ListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tasklist::truncate();
        DB::table('Tasklists')->insert([
            'list_name' => 'testlist1',
            'user_id' => '1'
        ]);

        DB::table('Tasklists')->insert([
            'list_name' => 'testlist2',
            'user_id' => '1'
        ]);

        DB::table('Tasklists')->insert([
            'list_name' => 'testlist3',
            'user_id' => '1'
        ]);

        DB::table('Tasklists')->insert([
            'list_name' => 'testlist4',
            'user_id' => '3'
        ]);
    }
}
