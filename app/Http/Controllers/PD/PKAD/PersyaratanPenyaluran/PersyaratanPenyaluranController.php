<?php

namespace App\Http\Controllers\PD\PKAD\PersyaratanPenyaluran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersyaratanPenyaluranController extends Controller
{
    private $menu = 'Pemerintahan Desa / Administrasi Pemerintahan Desa';
    private $title = 'Informasi Persyaratan Penyaluran ADD dan Dana Desa';

    public function __invoke(Request $request)
    {
        return view('pd/pkad/persyaratan-penyaluran/index', [
            'menu' => $this->menu,
            'title' => $this->title,
        ]);
    }
}
