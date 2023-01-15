<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholl extends Model
{
    use HasFactory;
    protected $table = 'identitas_sekolah';
    protected $fillable = [
        'nama_sekolah',
        'negara',
        'provinsi',
        'kota',
        'kode_postal',
        'alamat',
        'no_telp',
        'email',
        'kepala_sekolah',
        'pemilik_yayasan',
        'akreditasi',
    ];
}
