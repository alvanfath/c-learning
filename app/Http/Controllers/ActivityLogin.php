<?php

namespace App\Http\Controllers;

use App\Models\LoginAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityLogin extends Controller
{
    public function index(){
        return view('admin.activity.index');
    }

    public function myActivity(){
        $admin = LoginAdmin::where('admin_id', Auth::guard('admin')->user()->id)->get();
        return view('admin.my_activity', compact('admin'));
    }
}
