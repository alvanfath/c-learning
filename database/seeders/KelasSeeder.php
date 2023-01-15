<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            [
            "nama_kelas"=> "RPL XI-1",
            "jurusan_id"=> 1,
            "tingkat_id"=> 2,
            "walikelas_id"=> 50,
            ],
            [
            "nama_kelas"=> "RPL XI-2",
            "jurusan_id"=> 1,
            "tingkat_id"=> 2,
            "walikelas_id"=> 50,
            ],
            [
            "nama_kelas"=> "RPL XI-3",
            "jurusan_id"=> 1,
            "tingkat_id"=> 2,
            "walikelas_id"=> 50,
            ],
            [
            "nama_kelas"=> "RPL XII-1",
            "jurusan_id"=> 1,
            "tingkat_id"=> 3,
            "walikelas_id"=> 100,
            ],
            [
            "nama_kelas"=> "RPL XII-2",
            "jurusan_id"=> 1,
            "tingkat_id"=> 3,
            "walikelas_id"=> 100,
            ],
            [
            "nama_kelas"=> "RPL XII-3",
            "jurusan_id"=> 1,
            "tingkat_id"=> 3,
            "walikelas_id"=> 100,
            ],
            [
            "nama_kelas"=> "TKJ XI-1",
            "jurusan_id"=> 2,
            "tingkat_id"=> 2,
            "walikelas_id"=> 57,
            ],
            [
            "nama_kelas"=> "TKJ XI-2",
            "jurusan_id"=> 2,
            "tingkat_id"=> 2,
            "walikelas_id"=> 57,
            ],
            [
            "nama_kelas"=> "TKJ XI-3",
            "jurusan_id"=> 2,
            "tingkat_id"=> 2,
            "walikelas_id"=> 57,
            ],
            [
            "nama_kelas"=> "TKJ XII-1",
            "jurusan_id"=> 2,
            "tingkat_id"=> 3,
            "walikelas_id"=> 106,
            ],
            [
            "nama_kelas"=> "TKJ XII-2",
            "jurusan_id"=> 2,
            "tingkat_id"=> 3,
            "walikelas_id"=> 106,
            ],
            [
            "nama_kelas"=> "TKJ XII-3",
            "jurusan_id"=> 2,
            "tingkat_id"=> 3,
            "walikelas_id"=> 106,
            ],
            [
            "nama_kelas"=> "MMD XI-1",
            "jurusan_id"=> 3,
            "tingkat_id"=> 2,
            "walikelas_id"=> 64,
            ],
            [
            "nama_kelas"=> "MMD XI-2",
            "jurusan_id"=> 3,
            "tingkat_id"=> 2,
            "walikelas_id"=> 64,
            ],
            [
            "nama_kelas"=> "MMD XI-3",
            "jurusan_id"=> 3,
            "tingkat_id"=> 2,
            "walikelas_id"=> 64,
            ],
            [
            "nama_kelas"=> "MMD XII-1",
            "jurusan_id"=> 3,
            "tingkat_id"=> 3,
            "walikelas_id"=> 113,
            ],
            [
            "nama_kelas"=> "MMD XII-2",
            "jurusan_id"=> 3,
            "tingkat_id"=> 3,
            "walikelas_id"=> 113,
            ],
            [
            "nama_kelas"=> "MMD XII-3",
            "jurusan_id"=> 3,
            "tingkat_id"=> 3,
            "walikelas_id"=> 113,
            ],
            [
            "nama_kelas"=> "OTKP XI-1",
            "jurusan_id"=> 4,
            "tingkat_id"=> 2,
            "walikelas_id"=> 71,
            ],
            [
            "nama_kelas"=> "OTKP XI-2",
            "jurusan_id"=> 4,
            "tingkat_id"=> 2,
            "walikelas_id"=> 71,
            ],
            [
            "nama_kelas"=> "OTKP XII-2",
            "jurusan_id"=> 4,
            "tingkat_id"=> 3,
            "walikelas_id"=> 120,
            ],
            [
            "nama_kelas"=> "OTKP XII-1",
            "jurusan_id"=> 4,
            "tingkat_id"=> 3,
            "walikelas_id"=> 120,
            ],
            [
            "nama_kelas"=> "BDP XI-1",
            "jurusan_id"=> 5,
            "tingkat_id"=> 2,
            "walikelas_id"=> 78,
            ],
            [
            "nama_kelas"=> "BDP XI-2",
            "jurusan_id"=> 5,
            "tingkat_id"=> 2,
            "walikelas_id"=> 78,
            ],
            [
            "nama_kelas"=> "BDP XII-2",
            "jurusan_id"=> 5,
            "tingkat_id"=> 3,
            "walikelas_id"=> 127,
            ],
            [
            "nama_kelas"=> "BDP XII-1",
            "jurusan_id"=> 5,
            "tingkat_id"=> 3,
            "walikelas_id"=> 127,
            ],
            [
            "nama_kelas"=> "HTL XI-1",
            "jurusan_id"=> 6,
            "tingkat_id"=> 2,
            "walikelas_id"=> 85,
            ],
            [
            "nama_kelas"=> "HTL XI-2",
            "jurusan_id"=> 6,
            "tingkat_id"=> 2,
            "walikelas_id"=> 85,
            ],
            [
            "nama_kelas"=> "HTL XII-2",
            "jurusan_id"=> 6,
            "tingkat_id"=> 3,
            "walikelas_id"=> 134,
            ],
            [
            "nama_kelas"=> "HTL XII-1",
            "jurusan_id"=> 6,
            "tingkat_id"=> 3,
            "walikelas_id"=> 134,
            ],
            [
            "nama_kelas"=> "TBG XI-1",
            "jurusan_id"=> 7,
            "tingkat_id"=> 2,
            "walikelas_id"=> 92,
            ],
            [
            "nama_kelas"=> "TBG XI-2",
            "jurusan_id"=> 7,
            "tingkat_id"=> 2,
            "walikelas_id"=> 92,
            ],
            [
            "nama_kelas"=> "TBG XII-2",
            "jurusan_id"=> 7,
            "tingkat_id"=> 3,
            "walikelas_id"=> 142,
            ],
            [
            "nama_kelas"=> "TBG XII-1",
            "jurusan_id"=> 7,
            "tingkat_id"=> 3,
            "walikelas_id"=> 142,
            ],
            [
            "nama_kelas"=> "RPL X-1",
            "jurusan_id"=> 1,
            "tingkat_id"=> 1,
            "walikelas_id"=> 6,
            ],
            [

            "nama_kelas"=> "RPL X-2",
            "jurusan_id"=> 1,
            "tingkat_id"=> 1,
            "walikelas_id"=> 6,
            ],
            [

            "nama_kelas"=> "RPL X-3",
            "jurusan_id"=> 1,
            "tingkat_id"=> 1,
            "walikelas_id"=> 6,
            ],
            [

            "nama_kelas"=> "TKJ X-1",
            "jurusan_id"=> 2,
            "tingkat_id"=> 1,
            "walikelas_id"=> 8,
            ],
            [

            "nama_kelas"=> "TKJ X-2",
            "jurusan_id"=> 2,
            "tingkat_id"=> 1,
            "walikelas_id"=> 8,
            ],
            [

            "nama_kelas"=> "TKJ X-3",
            "jurusan_id"=> 2,
            "tingkat_id"=> 1,
            "walikelas_id"=> 8,
            ],
            [

            "nama_kelas"=> "MMD X-1",
            "jurusan_id"=> 3,
            "tingkat_id"=> 1,
            "walikelas_id"=> 15,
            ],
            [

            "nama_kelas"=> "MMD X-2",
            "jurusan_id"=> 3,
            "tingkat_id"=> 1,
            "walikelas_id"=> 15,
            ],
            [

            "nama_kelas"=> "MMD X-3",
            "jurusan_id"=> 3,
            "tingkat_id"=> 1,
            "walikelas_id"=> 15,
            ],
            [

            "nama_kelas"=> "OTKP X-1",
            "jurusan_id"=> 4,
            "tingkat_id"=> 1,
            "walikelas_id"=> 22,
            ],
            [

            "nama_kelas"=> "OTKP X-2",
            "jurusan_id"=> 4,
            "tingkat_id"=> 1,
            "walikelas_id"=> 22,
            ],
            [

            "nama_kelas"=> "BDP X-1",
            "jurusan_id"=> 5,
            "tingkat_id"=> 1,
            "walikelas_id"=> 29,
            ],
            [

            "nama_kelas"=> "BDP X-2",
            "jurusan_id"=> 5,
            "tingkat_id"=> 1,
            "walikelas_id"=> 29,
            ],
            [
                "nama_kelas"=> "HTL X-1",
                "jurusan_id"=> 6,
                "tingkat_id"=> 1,
                "walikelas_id"=> 36,
                ],
            [
            "nama_kelas"=> "HTL X-2",
            "jurusan_id"=> 6,
            "tingkat_id"=> 1,
            "walikelas_id"=> 36,
            ],
            [

            "nama_kelas"=> "TBG X-1",
            "jurusan_id"=> 7,
            "tingkat_id"=> 1,
            "walikelas_id"=> 48,
            ],
            [

            "nama_kelas"=> "TBG X-2",
            "jurusan_id"=> 7,
            "tingkat_id"=> 1,
            "walikelas_id"=> 48,
            ]
            ]);
    }
}
