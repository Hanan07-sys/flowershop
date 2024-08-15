<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          //
          $data = [
            ['nama' => 'Tanaman Luar Ruangan'],
            ['nama' => 'Buket Bunga'],
            ['nama' => 'Tanaman Hias Dalam Ruangan'],
            ['nama' => 'Tanaman Gantung'],
            ['nama' => 'Bunga Potong'],
        ];
        DB::table('kategori')->insert($data);
    }
}
