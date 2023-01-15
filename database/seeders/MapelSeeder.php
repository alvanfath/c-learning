<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mapel')->insert([
            [
                'nama' => 'Matematika',
                'tipe' => 'Akademis',
                'jurusan_id' => null,
                'logo' => 'mapel.jpg'
            ],
            [
                'nama' => 'Bahasa Inggris',
                'tipe' => 'Akademis',
                'jurusan_id' => null,
                'logo' => 'mapel.jpg'
            ],
            [
                'nama' => 'Bahasa Indonesia',
                'tipe' => 'Akademis',
                'jurusan_id' => null,
                'logo' => 'mapel.jpg'
            ],
            [
                'nama' => 'Pendidikan Agama',
                'tipe' => 'Akademis',
                'jurusan_id' => null,
                'logo' => 'mapel.jpg'
            ],
            [
                'nama' => 'PPKN',
                'tipe' => 'Akademis',
                'jurusan_id' => null,
                'logo' => 'mapel.jpg'
            ],
            [
                'nama' => 'Biologi',
                'tipe' => 'Akademis',
                'jurusan_id' => null,
                'logo' => 'mapel.jpg'
            ],
            [
                'nama' => 'Sejarah',
                'tipe' => 'Akademis',
                'jurusan_id' => null,
                'logo' => 'mapel.jpg'
            ],
            [
                'nama' => 'Pemograman Web dan Perangkat Bergerak',
                'tipe' => 'Produktif',
                'jurusan_id' => '1',
                'logo' => 'mapel.jpg'
            ],
            [
                'nama' => 'Pemodelan Perangkat Lunak',
                'tipe' => 'Produktif',
                'jurusan_id' => '1',
                'logo' => 'mapel.jpg'
            ],
            [
                'nama' => 'Administrator Jaringan Komputer',
                'tipe' => 'Produktif',
                'jurusan_id' => '2',
                'logo' => 'mapel.jpg'
            ],
            [
                'nama' => 'Teknisi Komputer dan Jaringan',
                'tipe' => 'Produktif',
                'jurusan_id' => '2',
                'logo' => 'mapel.jpg'
            ],
            [
                'nama' => 'Desain Grafis Percetakan',
                'tipe' => 'Produktif',
                'jurusan_id' => '3',
                'logo' => 'mapel.jpg'
            ],
            [
                'nama' => 'Animasi 2D dan 3D',
                'tipe' => 'Produktif',
                'jurusan_id' => '3',
                'logo' => 'mapel.jpg'
            ],
            [
                'nama' => 'Pengantar Ekonomi dan Bisnis',
                'tipe' => 'Produktif',
                'jurusan_id' => '4',
                'logo' => 'mapel.jpg'
            ],
            [
                'nama' => 'Pengantar Administrasi Perkantoran',
                'tipe' => 'Produktif',
                'jurusan_id' => '4',
                'logo' => 'mapel.jpg'
            ],
            [
                'nama' => 'Penataan Produk',
                'tipe' => 'Produktif',
                'jurusan_id' => '5',
                'logo' => 'mapel.jpg'
            ],
            [
                'nama' => 'Pengelolaan Bisnis Ritel',
                'tipe' => 'Produktif',
                'jurusan_id' => '5',
                'logo' => 'mapel.jpg'
            ],
            [
                'nama' => 'Industri Perhotelan',
                'tipe' => 'Produktif',
                'jurusan_id' => '6',
                'logo' => 'mapel.jpg'
            ],
            [
                'nama' => 'Industri Penyajian',
                'tipe' => 'Produktif',
                'jurusan_id' => '6',
                'logo' => 'mapel.jpg'
            ],
            [
                'nama' => 'Pengolahan dan Penyajian Makanan',
                'tipe' => 'Produktif',
                'jurusan_id' => '7',
                'logo' => 'mapel.jpg'
            ],
            [
                'nama' => 'Produk Cake dan Kue Indonesia',
                'tipe' => 'Produktif',
                'jurusan_id' => '7',
                'logo' => 'mapel.jpg'
            ],
        ]);
    }
}
