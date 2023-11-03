<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        \App\Models\User::factory(900)->create(
            [
                'username' => $faker->name,
            ]
        );
        // $faker = Faker::create('id_ID');
 
    	// for($i = 1; $i <= 50; $i++){
 
    	//       // insert data ke table pegawai menggunakan Faker
    	// 	DB::table('users')->insert([
    	// 		'username' => $faker->name,
    	// 		// 'pegawai_jabatan' => $faker->jobTitle,
    	// 		// 'pegawai_umur' => $faker->numberBetween(25,40),
    	// 		// 'pegawai_alamat' => $faker->address
    	// 	]);
 
    	// }
    }
}
