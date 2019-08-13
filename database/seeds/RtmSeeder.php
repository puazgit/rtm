<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class RtmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('id_ID');

	    for($i = 1; $i <= 5; $i++){
	        DB::table('tb_rtm')->insert([
	        	'rtm_ke' => '74',
	        	'tingkat' => 'pusat',
	        	'rkt' => '1',
	        	'tahun' => '2019',
	        	'created_at' => \Carbon\Carbon::now(),
	        	'updated_at' => \Carbon\Carbon::now(),

	        ]);
	    }
    }
}
