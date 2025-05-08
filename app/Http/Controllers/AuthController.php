<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::guest()) {
            return view('auth.login');
        }
        return view('dashboard.index');
    }
    public function authentification(AuthRequest $req)
    {
        $validated = $req->validated();
        if (Auth::attempt($validated)) {
            $user = Auth::user();
            if ($user->email == 'rin@gmail.com') {
                $req->session()->regenerate();
                return redirect()->intended('/');
            } else {
                $req->session()->invalidate();
                $req->session()->regenerateToken();
                return redirect()->back()->with('error', 'Anda bukan ADMIN RIN')->onlyInput('email');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password tidak ditemukan.',
        ])->onlyInput('email');
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
