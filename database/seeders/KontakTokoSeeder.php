<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class KontakTokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $tokoData = DB::table('toko')->select('id', 'nama')->get();


        foreach ($tokoData as $toko) {
            # code...
            $nama = str_replace('flower', '', strtolower($toko->nama));
            $trimNama = trim($nama);
            
            DB::table('kontak_toko')->insert([
                'alamat' => $faker->address,
                'no_hp' => $faker->phoneNumber,
                'toko_id' => $toko->id,
                'email' => $trimNama . '@gmail.com',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
