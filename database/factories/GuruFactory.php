<?php

namespace Database\Factories;

use App\Models\Mapel;
use App\Models\Jurusan;
use App\Models\Tingkat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $jurusan = Jurusan::all();
        foreach($jurusan as $item){
            $id_jurusan[] = $item->id;
        }
        $tingkat = Tingkat::all();
        foreach($tingkat as $item){
            $id_tingkat[] = $item->id;
        }
        $mapel = Mapel::where('tipe', 'Akademis')->get();
        foreach($mapel as $item){
            $id_mapel[] = $item->id;
        }
        return [
            'nama' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'jurusan_id' => '7',
            'tingkat_id' => '3',
            'mapel_id' => $this->faker->randomElement($mapel)
        ];
    }
}
