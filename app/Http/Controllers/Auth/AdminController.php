<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    private $menu = 'Admin';
    private $title = 'Kelola Pengguna';

    public function index()
    {
        $this->authorize('pengguna-berita');
        return view('auth/admin/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'desa' => User::where('peran', 'Akun Desa')->get(),
            'pengguna' => User::whereNot('peran', 'Akun Desa')->whereNot('peran', 'Admin')->get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna-berita');
        return view('auth/admin/index', [
            'menu' => $this->menu,
            'title' => 'Tambah Pengguna',
            'data' => new User(),
            'peran' => [
                'Akun Desa',
                'Kepala Bidang',
                'Sekretariat',
                'BPD',
                'Bappeda',
                'Inspektorat',
            ],
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        $this->authorize('pengguna-berita');
        $request->merge([
            'password' => Hash::make($request->password),
        ]);
        User::create($request->except(['password_confirmation']));
        return redirect(route('admin.index'))->with('berhasil', 'Pengguna berhasil ditambahkan!');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $this->authorize('pengguna-berita');
        return view('auth/admin/index', [
            'menu' => $this->menu,
            'title' => $user->nama_pengguna,
            'data' => $user,
            'peran' => [
                'Akun Desa',
                'Kepala Bidang',
                'Sekretariat',
                'BPD',
                'Bappeda',
                'Inspektorat',
            ],
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('pengguna-berita');
        User::where('id', $user->id)->update($request->except('_token', '_method'));
        return redirect(route('admin.index'))->with('berhasil', 'Pengguna berhasil diubah!');
    }

    public function destroy(User $user)
    {
        $this->authorize('pengguna-berita');
        User::destroy($user->id);
        return back()->with('berhasil', 'Pengguna berhasil dihapus!');
    }
}
