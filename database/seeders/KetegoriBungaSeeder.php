<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KetegoriBungaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transaksiData = DB::table('kategori')->select('id')->get();
        $bungaId = DB::table('bunga')->pluck('id')->toArray();

        foreach ($transaksiData as $transaksi) {
            # code...

            
            DB::table('kategori_bunga')->insert([
                'bunga_id' => $bungaId[array_rand($bungaId)], 
                'kategori_id' => $transaksi->id, 
                'created_at'=> now(),
                'updated_at'=> now()
            ]);
        }
    }
}
