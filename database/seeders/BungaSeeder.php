<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BungaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');


        $data = [
            ['nama' => 'Anggrek'],
            ['nama' => 'Tulip'],
            ['nama' => 'Lily'],
            ['nama' => 'Orchid'],
            ['nama' => 'Sunflower'],
        ];
        $tokoId = DB::table('toko')->pluck('id')->toArray();

        for ($i=0; $i < 5 ; $i++) { 
            # code...

            
            DB::table('bunga')->insert([
                'nama'=> $data[$i]['nama'],
                'tanggal_pengadaan'=> $faker->dateTime,
                'stok'=> $faker->randomDigit(),
                'harga'=> $faker->randomNumber(6,true),
                'toko_id' => $tokoId[array_rand($tokoId)], 
                'created_at'=> now(),
                'updated_at'=> now()
            ]);
        }
    }
}
