<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'group_name' => 'SuperUser',
            'group_description' => 'for Nahor Analytics Super User',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('groups')->insert([
            'group_name' => 'Administrator',
            'group_description' => 'for Company Administrators',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('groups')->insert([
            'group_name' => 'Assistant',
            'group_description' => 'for Company Assistants',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('groups')->insert([
            'group_name' => 'Lawyer',
            'group_description' => 'for Company Lawyers',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
