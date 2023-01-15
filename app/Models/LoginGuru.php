<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginGuru extends Model
{
    use HasFactory;
    protected $table = 'login_guru';
    protected $fillable = ['guru_id','aktivitas'];
    public function guru(){
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }
}
