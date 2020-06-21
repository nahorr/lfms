<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$company1 = DB::table('companies')->where('company_name', 'Nahorr Analytics')->first();
        $company2 = DB::table('companies')->where('company_name', 'Examginny Schools LTD')->first();

        DB::table('users')->insert([
            'name' => 'Super User',
            'group_id' => 1,
            'email' => 'super@gmail.com',
            'password' => bcrypt('123456'),
            'company_id' => $company1->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

         DB::table('users')->insert([
            'name' => 'Admin One',
            'group_id' => 2,
            'email' => 'adminone@gmail.com',
            'password' => bcrypt('123456'),
            'company_id' => $company2->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

         DB::table('users')->insert([
            'name' => 'Assistant One',
            'group_id' => 3,
            'email' => 'assistantone@gmail.com',
            'password' => bcrypt('123456'),
            'company_id' => $company2->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
         DB::table('users')->insert([
            'name' => 'Lawyer One',
            'group_id' => 4,
            'email' => 'lawyerone@gmail.com',
            'password' => bcrypt('123456'),
            'company_id' => $company2->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
