<?php

namespace Database\Factories;

use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Tingkat;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $kelas = Kelas::all();
        foreach($kelas as $item){
            $id_kelas[] = $item->id;
        }
        $kelas_id = $this->faker->randomElement($id_kelas);
        $kelas_specific = Kelas::findOrFail($kelas_id);
        $id_jurusan = Jurusan::where('id', $kelas_specific->jurusan_id)->first();
        $id_tingkat = Tingkat::where('id', $kelas_specific->tingkat_id)->first();

        return [
            'nik' => $this->faker->unique()->nik(),
            'nis' => $this->faker->unique()->numerify('1200####'),
            'nama_lengkap' => $this->faker->name(),
            'gender' => Arr::random(['Perempuan', 'Laki-laki']),
            'tanggal_lahir' => $this->faker->dateTimeBetween('-18 years', '-15 years'),
            'alamat' => $this->faker->address(),
            'email' => $this->faker->unique()->email(),
            'id_kelas' => $kelas_id,
            'id_jurusan' => $id_jurusan->id,
            'id_tingkat' => $id_tingkat->id,
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
