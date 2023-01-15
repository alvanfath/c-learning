<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = 'jurusan';
    protected $fillable = [
        'nama',
        'singkatan',
        'pembimbing_id'
    ];

    public function pembimbing(){
        return $this->belongsTo(Guru::class,'pembimbing_id','id');
    }

    public function guru(){
        return $this->hasMany(Guru::class);
    }

    public function mapel(){
        return $this->hasMany(Mapel::class);
    }

    public function kelas(){
        return $this->hasMany(Kelas::class);
    }

    public function user(){
        return $this->hasMany(User::class);
    }

    public function materi(){
        return $this->hasMany(Materi::class);
    }
}
