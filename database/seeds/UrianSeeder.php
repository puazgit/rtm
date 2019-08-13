<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class UrianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('id_ID');

	    for($i = 1; $i <= 10; $i++){
	        DB::table('tb_uraian')->insert([
	        	'id_index' => '1',
	        	'analisis' => $faker->paragraph,
	        	'r_uraian' => $faker->paragraph,
	        	'r_target' => $faker->paragraph,
	        	'r_pic' => $faker->title,
	        	'tindak' => $faker->paragraph,
	        	'p_rencana' => $faker->paragraph,
	        	'p_realisasi' => $faker->paragraph,
	        	'status' => '0',
	        	'created_at' => \Carbon\Carbon::now(),
	        	'updated_at' => \Carbon\Carbon::now(),

	        ]);
	    }
    }
}
