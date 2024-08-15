<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;
use Faker\Factory as Faker;


class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $data = [
        //     ['nama' => 'Suryani','alamat' => 'Jln.A Yani KM.23', 'kontak' => '0821'],
        //     ['nama' => 'Abdullah','alamat' => 'Jln. Gatot Subroto', 'kontak' => '0822'],
        //     ['nama' => 'Dimai', 'alamat' => 'Jln. Gambut Pematang','kontak' => '0823'],
        // ];
        // DB::table('toko')->insert($data);
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 5; $i++) {
            # code...
            if ($i % 2 == 0) {
                $nama = $faker->firstName;
            } else {
                $nama = $faker->lastName;
            }
            DB::table('toko')->insert([
                'nama' => $nama . ' Flower',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
