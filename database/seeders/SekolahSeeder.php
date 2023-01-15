<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('identitas_sekolah')->insert([
            'nama_sekolah' => 'SMK Lorem Ipsum',
            'negara' => 'Indonesia',
            'provinsi' => 'Jakarta',
            'kota' => 'DKI Jakarta',
            'kode_postal' => '13210',
            'alamat' => ' Jl Pulo Mas Tmr K Bl G-H C/1, Dki Jakarta',
            'no_telp' => '0-21-470-0451',
            'email' => 'lorem@gmail.com',
            'kepala_sekolah' => 'Ujang Sarip S.Pd.',
            'pemilik_yayasan' => 'Elon Musk',
            'akreditasi' => 'A++',
            'created_at' => now()
        ]);
    }
}
