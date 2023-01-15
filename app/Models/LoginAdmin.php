<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginAdmin extends Model
{
    use HasFactory;
    protected $table = 'login_admin';
    protected $fillable = ['admin_id','aktivitas'];
    public function admin(){
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
}
