<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tonton extends Model
{
    use HasFactory;
    protected $table = 'tonton_materi';
    protected $fillable = ['materi_id'];
    public function materi(){
        return $this->belongsTo(Materi::class, 'materi_id', 'id');
    }
}
