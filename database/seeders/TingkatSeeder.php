<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TingkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tingkat')->insert([
            [
                'tingkat_kelas' => 'X'
            ],
            [
                'tingkat_kelas' => 'XI'
            ],
            [
                'tingkat_kelas' => 'XII'
            ],
        ]);
    }
}
