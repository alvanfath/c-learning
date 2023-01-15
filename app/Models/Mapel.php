<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'mapel';
    protected $fillable = [
        'nama',
        'tipe',
        'jurusan_id',
        'logo'
    ];

    public function guru(){
        return $this->hasMany(Guru::class);
    }
    public function materi(){
        return $this->hasMany(Materi::class);
    }

    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }
}
