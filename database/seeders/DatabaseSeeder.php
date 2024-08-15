<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $faker = Faker::create('id_ID');
        for ($i=1; $i <= 5 ; $i++) { 
            # code...
            DB::table('toko')->insert([
                'nama'=> $faker->name,
                'created_at'=> now(),
                'updated_at'=> now()
            ]);
        }
    }
}
