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
            'name' => 'testlist1'
        ]);

        DB::table('Tasklists')->insert([
            'name' => 'testlist2'
        ]);

        DB::table('Tasklists')->insert([
            'name' => 'testlist3'
        ]);
    }
}
