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
        	'reg_code' => 'YGH-TRG-1RT-UYH',
            'name' => 'Nahorr Analytics',
        ]);
    }
}
