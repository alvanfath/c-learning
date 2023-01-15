<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Guru extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'guru';
    protected $fillable = [
        'nama',
        'email',
        'password',
        'jurusan_id',
        'mapel_id',
        'tingkat_id',
        'gambar'
    ];

    public function tingkat(){
        return $this->belongsTo(Tingkat::class, 'tingkat_id', 'id');
    }
    public function mapel(){
        return $this->belongsTo(Mapel::class, 'mapel_id', 'id');
    }
    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }
    public function pembimbing_jurusan(){
        return $this->hasMany(Jurusan::class);
    }
    public function kelas(){
        return $this->hasMany(Kelas::class, 'walikelas_id', 'id');
    }
    public function login(){
        return $this->hasMany(LoginGuru::class);
    }
}
