<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::truncate();
        DB::table('tasks')->insert([
            'list_id' => '1',
            'user_id' => '1',
            'task_name' => 'testtask',
            'is_done' => true
        ]);

        DB::table('tasks')->insert([
            'list_id' => '1',
            'user_id' => '1',
            'task_name' => 'testtask2',
            'is_done' => true
        ]);

        DB::table('tasks')->insert([
            'list_id' => '1',
            'user_id' => '1',
            'task_name' => 'testtask3',
            'is_done' => false
        ]);

        DB::table('tasks')->insert([
            'list_id' => '2',
            'user_id' => '1',
            'task_name' => 'Test task form list 2',
            'is_done' => false
        ]);


    }
}
