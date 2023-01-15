<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurusan')->insert([
                [
                    'nama' => 'Rekayasa Perangkat Lunak',
                    'singkatan' => 'RPL'
                ],
                [
                    'nama' => 'Teknik Komputer Jaringan',
                    'singkatan' => 'TKJ'
                ],
                [
                    'nama' => 'Multimedia',
                    'singkatan' => 'MMD'
                ],
                [
                    'nama' => 'Otomatisasi Tata kelola Perkantoran',
                    'singkatan' => 'OTKP',
                ],
                [
                    'nama' => 'Bisnis Daring dan Pemasaran',
                    'singkatan' => 'BDP',
                ],
                [
                    'nama' => 'Perhotelan',
                    'singkatan' => 'HTL',
                ],
                [
                    'nama' => 'Tata Boga',
                    'singkatan' => 'TBG',
                ]
            ]
        );
    }
}
