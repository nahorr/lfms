<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'company_name' => 'Nahorr Analytics',
        ]);
        DB::table('companies')->insert([
            'company_name' => 'Examginny Schools LTD',
        ]);
    }
}
