<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginSiswa extends Model
{
    use HasFactory;
    protected $table = 'login_siswa';
    protected $fillable = ['siswa_id','aktivitas'];
    public function siswa(){
        return $this->belongsTo(User::class, 'siswa_id', 'id');
    }
}
