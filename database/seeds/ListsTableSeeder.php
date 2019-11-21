<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lists')->insert([
            'name' => 'testlist1'
        ]);

        DB::table('lists')->insert([
            'name' => 'testlist2'
        ]);

        DB::table('lists')->insert([
            'name' => 'testlist3'
        ]);
    }
}
