<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Guru;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        DB::table('guru')->insert([
            [
            "nama"=> "Taufan Saputra",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 1,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Cahyadi Jamal Wacana S.H.",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 1,
            "mapel_id"=> 3
            ],
            [
            "nama"=> "Tiara Hamima Widiastuti S.I.Kom",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 1,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Manah Samosir",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 1,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Yance Handayani",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 1,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Emas Kurniawan",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 1,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Malika Zulaika",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 1,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Baktiono Hardiansyah S.E.",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 1,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Satya Mangunsong",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 1,
            "mapel_id"=> 3
            ],
            [
            "nama"=> "Ibrahim Hutasoit",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 1,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Ella Suartini",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 1,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Elvina Farida",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 1,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Umar Utama",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 1,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Asman Pratama",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 1,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Ika Pudjiastuti",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 1,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Bella Purnawati",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 1,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Martana Napitupulu",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 1,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Gawati Sudiati",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 1,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Simon Gunarto",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 1,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Mutia Maryati",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 1,
            "mapel_id"=> 3
            ],
            [
            "nama"=> "Olga Ridwan Uwais S.E.",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 1,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Dwi Megantara S.Gz",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 1,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Patricia Aryani",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 1,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Zelda Mutia Laksita",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 1,
            "mapel_id"=> 3
            ],
            [
            "nama"=> "Mustofa Hidayat",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 1,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Jessica Laksita",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 1,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Fitriani Laksita",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 1,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Joko Latupono",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 1,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Cindy Purwanti S.Psi",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 1,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Jaka Narpati",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 1,
            "mapel_id"=> 3
            ],
            [
            "nama"=> "Safina Maimunah Rahayu",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 1,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Kacung Lantar Pangestu M.TI.",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 1,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Yoga Caket Rajasa S.E.",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 1,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Gilang Karya Putra",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 1,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Laras Oktaviani",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 1,
            "mapel_id"=> 3
            ],
            [
            "nama"=> "Cici Eva Pudjiastuti",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 1,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Kasiyah Ira Laksita",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 1,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Vero Utama M.TI.",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 1,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Cemeti Gunawan",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 1,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Baktianto Haryanto",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 1,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Kusuma Slamet Saptono M.TI.",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 1,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Laksana Simanjuntak",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 1,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Bahuwarna Sihombing",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 1,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Oman Simanjuntak",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 1,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Capa Radika Permadi S.Farm",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 1,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Eka Suryatmi",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 1,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Anastasia Victoria Widiastuti",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 1,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Vanesa Melani",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 1,
            "mapel_id"=> 3
            ],
            [
            "nama"=> "Victoria Vera Riyanti S.IP",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 1,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Maryadi Prasetyo",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 2,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Cinthia Hartati S.Sos",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 2,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Ozy Darmana Tamba",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 2,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Ina Sarah Sudiati M.Kom.",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 2,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Sadina Rahimah M.Pd",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 2,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Karen Nurdiyanti",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 2,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Siska Pertiwi",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 2,
            "mapel_id"=> 3
            ],
            [
            "nama"=> "Dodo Pranata Waskita S.Ked",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 2,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Kawaya Dalimin Napitupulu M.Pd",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 2,
            "mapel_id"=> 3
            ],
            [
            "nama"=> "Ganda Najmudin",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 2,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Almira Olivia Puspita M.Kom.",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 2,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Yoga Prasetya Hutapea M.Pd",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 2,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Luis Latif Saputra S.Psi",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 2,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Cici Winarsih S.Gz",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 2,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Maya Belinda Yuliarti S.Ked",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 2,
            "mapel_id"=> 3
            ],
            [
            "nama"=> "Mursinin Ramadan",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 2,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Titin Devi Anggraini",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 2,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Restu Safitri",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 2,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Pia Sabrina Wulandari S.Gz",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 2,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Rahmat Maryadi M.Kom.",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 2,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Ikin Winarno S.IP",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 2,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Qori Palastri",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 2,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Harimurti Januar",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 2,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Eka Atma Marbun S.Pd",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 2,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Intan Mardhiyah S.IP",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 2,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Opan Napitupulu",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 2,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Xanana Pranowo",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 2,
            "mapel_id"=> 3
            ],
            [
            "nama"=> "Sadina Puji Permata",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 2,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Tri Wasita M.Ak",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 2,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Heru Lazuardi",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 2,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Purwadi Tamba",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 2,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Dalimin Haryanto",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 2,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Gamblang Siregar S.Kom",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 2,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Gamanto Waluyo S.Farm",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 2,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Viktor Rajasa",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 2,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Sarah Zulaika",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 2,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Zahra Uyainah",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 2,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Gilda Rina Namaga M.Kom.",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 2,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Patricia Fujiati S.Ked",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 2,
            "mapel_id"=> 3
            ],
            [
            "nama"=> "Harto Wacana",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 2,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Dirja Setiawan S.I.Kom",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 2,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Ian Thamrin",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 2,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Jatmiko Atmaja Firmansyah S.I.Kom",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 2,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Mariadi Napitupulu",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 2,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Rika Safitri",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 2,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Kania Hassanah S.Farm",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 2,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Caturangga Dongoran",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 2,
            "mapel_id"=> 3
            ],
            [
            "nama"=> "Oni Farida S.Kom",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 2,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Fathonah Fujiati",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 2,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Simon Bagus Ardianto S.I.Kom",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 3,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Hasna Zelaya Nasyidah S.Pt",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 3,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Devi Hasanah",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 3,
            "mapel_id"=> 3
            ],
            [
            "nama"=> "Titi Karimah Suartini",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 3,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Nugraha Latupono",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 3,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Puput Wijayanti",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 3,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Puji Farida S.T.",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 3,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Limar Jais Hutasoit",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 3,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Wage Daliman Marbun M.Farm",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 3,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Wahyu Wakiman Manullang S.Gz",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 3,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Gada Marsudi Gunawan",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 3,
            "mapel_id"=> 3
            ],
            [
            "nama"=> "Rosman Edison Pradana S.T.",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 3,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Gamanto Salahudin",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 3,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Warji Kuswoyo M.M.",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 3,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Karsana Hutasoit",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 3,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Cayadi Nashiruddin M.Kom.",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 3,
            "mapel_id"=> 3
            ],
            [
            "nama"=> "Hendri Zulkarnain",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 3,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Ifa Bella Hastuti",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 3,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Langgeng Wahyudin",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 3,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Rachel Winarsih",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 3,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Irnanto Dabukke",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 3,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Darmana Hakim",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 3,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Estiono Wacana",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 3,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Ira Palastri",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 3,
            "mapel_id"=> 3
            ],
            [
            "nama"=> "Carla Widya Susanti",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 3,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Ophelia Palastri",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 3,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Soleh Siregar",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 3,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Betania Mandasari",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 3,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Rika Pertiwi",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 3,
            "mapel_id"=> 3
            ],
            [
            "nama"=> "Tedi Dabukke",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 3,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Darsirah Respati Widodo S.Farm",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 3,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Melinda Hasanah",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 3,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Damar Saputra",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 3,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Intan Rahimah",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 3,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Maya Puspasari S.E.",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 3,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Lala Prastuti",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 3,
            "mapel_id"=> 3
            ],
            [
            "nama"=> "Sakura Maryati",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 3,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Darimin Rangga Nababan",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 3,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Samsul Prasasta",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 3,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Paris Laksmiwati",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 3,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Rahmat Yusuf Wibowo",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 3,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Warsa Samosir",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 3,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Sabrina Lintang Mandasari",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 3,
            "mapel_id"=> 1
            ],
            [
            "nama"=> "Hasna Tantri Pertiwi",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 3,
            "mapel_id"=> 2
            ],
            [
            "nama"=> "Paiman Pratama",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 3,
            "mapel_id"=> 3
            ],
            [
            "nama"=> "Kania Riyanti",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 3,
            "mapel_id"=> 6
            ],
            [
            "nama"=> "Harjasa Prakasa",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 3,
            "mapel_id"=> 5
            ],
            [
            "nama"=> "Cakrajiya Purwanto Mangunsong",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 3,
            "mapel_id"=> 7
            ],
            [
            "nama"=> "Harjaya Saptono",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 3,
            "mapel_id"=> 4
            ],
            [
            "nama"=> "Jhon die",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 1,
            "mapel_id"=> 8
            ],
            [
            "nama"=> "Jhon2",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 1,
            "mapel_id"=> 9
            ],
            [
            "nama"=> "Supratman",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 2,
            "mapel_id"=> 8
            ],
            [
            "nama"=> "Supirman",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 2,
            "mapel_id"=> 9
            ],
            //rpl
            [
            "nama"=> "Kanjeng weh",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 1,
            "mapel_id"=> 8
            ],
            [
            "nama"=> "Kanjeng anjime",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 1,
            "mapel_id"=> 9
            ],
            [
            "nama"=> "Kanjeng ganteng",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 2,
            "mapel_id"=> 8
            ],
            [
            "nama"=> "Kanjeng sip weh",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 2,
            "mapel_id"=> 9
            ],
            [
            "nama"=> "Kanjeng ganteng",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 3,
            "mapel_id"=> 8
            ],
            [
            "nama"=> "Juliana Mansur",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 1,
            "tingkat_id"=> 3,
            "mapel_id"=> 9
            ],

            //tkj
            [
            "nama"=> "Gendeng weh",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 1,
            "mapel_id"=> 10
            ],
            [
            "nama"=> "Gendeng anjime",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 1,
            "mapel_id"=> 11
            ],
            [
            "nama"=> "Gendeng ganteng",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 2,
            "mapel_id"=> 10
            ],
            [
            "nama"=> "Gendeng sip weh",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 2,
            "mapel_id"=> 11
            ],
            [
            "nama"=> "Gendeng ganteng",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 3,
            "mapel_id"=> 10
            ],
            [
            "nama"=> "Kelas bang ganteng",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 2,
            "tingkat_id"=> 3,
            "mapel_id"=> 11
            ],

            //mmd
            [
            "nama"=> "Gitar weh",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 1,
            "mapel_id"=> 12
            ],
            [
            "nama"=> "Gitar anjime",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 1,
            "mapel_id"=> 13
            ],
            [
            "nama"=> "Gitar ganteng",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 2,
            "mapel_id"=> 12
            ],
            [
            "nama"=> "Gitar sip weh",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 2,
            "mapel_id"=> 13
            ],
            [
            "nama"=> "Gitar ganteng",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 3,
            "mapel_id"=> 12
            ],
            [
            "nama"=> "Gitar",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 3,
            "tingkat_id"=> 3,
            "mapel_id"=> 13
            ],

            //otkp
            [
            "nama"=> "Excel weh",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 1,
            "mapel_id"=> 14
            ],
            [
            "nama"=> "Excel anjime",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 1,
            "mapel_id"=> 15
            ],
            [
            "nama"=> "Excel ganteng",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 2,
            "mapel_id"=> 14
            ],
            [
            "nama"=> "Excel sip weh",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 2,
            "mapel_id"=> 15
            ],
            [
            "nama"=> "Excel ganteng",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 3,
            "mapel_id"=> 14
            ],
            [
            "nama"=> "Excel",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 4,
            "tingkat_id"=> 3,
            "mapel_id"=> 15
            ],

            //bdp
            [
            "nama"=> "Risol weh",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 1,
            "mapel_id"=> 16
            ],
            [
            "nama"=> "Risol anjime",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 1,
            "mapel_id"=> 17
            ],
            [
            "nama"=> "Risol ganteng",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 2,
            "mapel_id"=> 16
            ],
            [
            "nama"=> "Risol sip weh",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 2,
            "mapel_id"=> 17
            ],
            [
            "nama"=> "Risol ganteng",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 3,
            "mapel_id"=> 16
            ],
            [
            "nama"=> "Risol",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 5,
            "tingkat_id"=> 3,
            "mapel_id"=> 17
            ],

            //htl
            [
            "nama"=> "Handuk weh",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 1,
            "mapel_id"=> 18
            ],
            [
            "nama"=> "Handuk anjime",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 1,
            "mapel_id"=> 19
            ],
            [
            "nama"=> "Handuk ganteng",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 2,
            "mapel_id"=> 18
            ],
            [
            "nama"=> "Handuk sip weh",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 2,
            "mapel_id"=> 19
            ],
            [
            "nama"=> "Handuk ganteng",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 3,
            "mapel_id"=> 18
            ],
            [
            "nama"=> "Handuk",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 6,
            "tingkat_id"=> 3,
            "mapel_id"=> 19
            ],

            //tbg
            [
            "nama"=> "Masak weh",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 1,
            "mapel_id"=> 20
            ],
            [
            "nama"=> "Masak anjime",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 1,
            "mapel_id"=> 21
            ],
            [
            "nama"=> "Masak ganteng",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 2,
            "mapel_id"=> 20
            ],
            [
            "nama"=> "Masak sip weh",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 2,
            "mapel_id"=> 21
            ],
            [
            "nama"=> "Masak ganteng",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 3,
            "mapel_id"=> 20
            ],
            [
            "nama"=> "Masak",
            "email" => $faker->unique()->safeEmail(),
            "password" => Hash::make("password"),
            "jurusan_id"=> 7,
            "tingkat_id"=> 3,
            "mapel_id"=> 21
            ],
            ]);
        }
}
