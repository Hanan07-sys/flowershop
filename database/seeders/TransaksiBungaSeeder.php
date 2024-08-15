<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiBungaSeeder extends Seeder
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

        for ($i=0; $i < 5 ; $i++) { 
            # code...

            
            DB::table('transaksi_bunga')->insert([
                'barcode'=> $faker->ean13,
                'tipe_pembayaran'=> $faker->creditCardType,
                'tanggal_pembayaran'=> $faker->dateTime,
                'created_at'=> now(),
                'updated_at'=> now()
            ]);
        }
    }
}
