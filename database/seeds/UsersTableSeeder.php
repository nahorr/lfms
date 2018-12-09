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
    	$company = DB::table('companies')->first();

        DB::table('users')->insert([
            'name' => 'Nnamdi Okeke',
            'email' => 'nahorr@gmail.com',
            'password' => bcrypt('123456'),
            'reg_code' => $company->reg_code,
            'is_admin' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
