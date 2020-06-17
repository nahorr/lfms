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
            'email' => 'super@gmail.com',
            'password' => bcrypt('123456'),
            //'reg_code' => $company->reg_code,
            'company_id' => $company1->id,
            'is_admin' => 1,
            'is_superadmin' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

         DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            //'reg_code' => $company->reg_code,
            'company_id' => $company2->id,
            'is_admin' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

         DB::table('users')->insert([
            'name' => 'Regular User',
            'email' => 'Regular@gmail.com',
            'password' => bcrypt('123456'),
            //'reg_code' => $company->reg_code,
            'company_id' => $company2->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
