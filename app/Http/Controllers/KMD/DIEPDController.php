<?php

namespace App\Http\Controllers\KMD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DIEPDController extends Controller
{
    private $menu = 'Kelembagaan Masyarakat Desa';
    private $title = 'Data Informasi Dan Evaluasi Perkembangan Desa';

    public function __invoke(Request $request)
    {
        return view('kmd/diepd/index', [
            'menu' => $this->menu,
            'title' => $this->title,
        ]);
    }
}
