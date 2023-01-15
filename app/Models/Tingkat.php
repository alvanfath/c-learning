<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tingkat extends Model
{
    use HasFactory;
    protected $table = 'tingkat';
    protected $fillable = [
        'tingkat_kelas'
    ];

    public function guru(){
        return $this->hasMany(Guru::class);
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
