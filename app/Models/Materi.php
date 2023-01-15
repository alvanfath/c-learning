<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $table = 'materi';
    protected $fillable = ['judul', 'mapel_id', 'tingkat_id', 'jurusan_id','deskripsi' ,'tipe', 'file', 'uploaded_by', 'id_guru'];

    public function tingkat(){
        return $this->belongsTo(Tingkat::class, 'tingkat_id', 'id');
    }
    public function mapel(){
        return $this->belongsTo(Mapel::class, 'mapel_id', 'id');
    }
    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }
    public function guru(){
        return $this->belongsTo(Guru::class, 'id_guru', 'id');
    }

    public function tonton(){
        return $this->hasMany(Tonton::class, 'materi_id', 'id');
    }
    public function download(){
        return $this->hasMany(Download::class, 'materi_id', 'id');
    }
}
