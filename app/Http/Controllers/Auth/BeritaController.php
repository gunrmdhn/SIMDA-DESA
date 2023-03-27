<?php

namespace App\Http\Controllers\Auth;

use App\Models\Berita;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreberitaRequest;
use App\Http\Requests\UpdateberitaRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class BeritaController extends Controller
{
    private $menu = 'Admin';
    private $title = 'Berita';

    public function index()
    {
        $this->authorize('pengguna-berita');
        return view('auth/berita/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'data' => Berita::get(),
        ]);
    }

    public function create()
    {
        $this->authorize('pengguna-berita');
        $kode = IdGenerator::generate([
            'table' => 'tabel_berita',
            'field' => 'kode',
            'length' => 10,
            'prefix' => date('ymd-'),
            'reset_on_prefix_change' => true,
        ]);
        return view('auth/berita/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $kode,
            'data' => new Berita(),
        ]);
    }

    public function store(StoreBeritaRequest $request)
    {
        $this->authorize('pengguna-berita');
        $data = $request->all();
        $data['gambar'] = $request->file('gambar')->storeAs('auth/berita', $request->file('gambar')->hashName());
        Berita::create($data);
        return redirect(route('berita.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(Berita $berita)
    {
        //
    }

    public function edit(Berita $berita)
    {
        $this->authorize('pengguna-berita');
        return view('auth/berita/index', [
            'menu' => $this->menu,
            'title' => $this->title,
            'kode' => $berita->kode,
            'data' => $berita,
        ]);
    }

    public function update(UpdateBeritaRequest $request, Berita $berita)
    {
        $this->authorize('pengguna-berita');
        $data = $request->except('_token', '_method');
        if ($request->file('gambar')) {
            Storage::delete($berita->gambar);
            $data['gambar'] = $request->file('gambar')->storeAs('auth/berita', $request->file('gambar')->hashName());
        }
        Berita::where('id', $berita->id)->update($data);
        return redirect(route('berita.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(Berita $berita)
    {
        $this->authorize('pengguna-berita');
        Storage::delete($berita->gambar);
        Berita::destroy($berita->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
