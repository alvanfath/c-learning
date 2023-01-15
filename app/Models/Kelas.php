<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable = [
        'nama_kelas',
        'jurusan_id',
        'tingkat_id',
        'walikelas_id',
    ];


    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }
    public function tingkat()
    {
        return $this->belongsTo(Tingkat::class, 'tingkat_id', 'id');
    }
    public function walikelas()
    {
        return $this->belongsTo(Guru::class, 'walikelas_id', 'id');
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}
