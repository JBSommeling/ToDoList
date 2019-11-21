<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'list_id' => '1',
            'user_id' => '1',
            'name' => 'testtask',
            'is_done' => 'true'
        ]);
    }
}
