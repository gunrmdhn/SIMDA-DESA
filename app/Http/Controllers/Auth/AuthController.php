<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $menu = 'Kata Sandi';
    private $sub_menu = 'Ubah Kata Sandi';

    public function index()
    {
        return view('auth/index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nama_pengguna' => 'required|alpha_dash',
            'password' => 'required|min:8',
        ], [], [
            'nama_pengguna' => 'nama pengguna',
            'password' => 'kata sandi',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('index'))->with('berhasil', 'Selamat datang, ' . auth()->user()->nama_pengguna);
        }
        return back()->with('gagal', 'Gagal masuk!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('index'));
    }

    public function edit(User $user)
    {
        return view('auth/kata-sandi/index', [
            'menu' => $this->menu,
            'sub_menu' => $this->sub_menu,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'password' => 'required|min:8|confirmed',
        ], [], [
            'password' => 'kata sandi',
        ]);
        $validatedData['password'] = Hash::make($request->password);
        User::where('id', $user->id)->update($validatedData);
        return redirect(route('index'))->with('berhasil', 'Kata sandi' . $request->nama_pengguna . ' berhasil diubah!');
    }
}
