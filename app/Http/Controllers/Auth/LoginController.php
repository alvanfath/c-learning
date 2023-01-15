<?php

namespace App\Http\Controllers\Auth;

use App\Models\LoginGuru;
use App\Models\LoginAdmin;
use App\Models\LoginSiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            LoginSiswa::create([
                'siswa_id' => Auth::user()->id,
                'aktivitas' => 'Login'
            ]);
            return redirect()->route('siswa.dashboard');

        }elseif (Auth::guard('guru')->attempt($credentials)) {
            $request->session()->regenerate();
            LoginGuru::create([
                'guru_id' => Auth::guard('guru')->user()->id,
                'aktivitas' => 'Login'
            ]);
            return redirect()->route('guru.dashboard');

        }elseif (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            LoginAdmin::create([
                'admin_id' => Auth::guard('admin')->user()->id,
                'aktivitas' => 'Login'
            ]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(){
        if (Auth::guard('admin')->check()) {
            LoginAdmin::create([
                'admin_id' => Auth::guard('admin')->user()->id,
                'aktivitas' => 'Logout'
            ]);
            Auth::guard('admin')->logout();
            return redirect()->route('login');
        } elseif (Auth::guard('guru')->check()) {
            LoginGuru::create([
                'guru_id' => Auth::guard('guru')->user()->id,
                'aktivitas' => 'Logout'
            ]);
            Auth::guard('guru')->logout();
            return redirect()->route('login');
        } elseif (Auth::check()) {
            LoginSiswa::create([
                'siswa_id' => Auth::user()->id,
                'aktivitas' => 'Logout'
            ]);
            Auth::logout();
            return redirect()->route('login');
        }
    }
}
