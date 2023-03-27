<?php

namespace App\Http\Controllers\PPMD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PUEMController extends Controller
{
    private $menu = 'Pembangunan Dan Pemberdayaan Masyarakat Desa';
    private $title = 'Pengembangan Usaha Ekonomi Masyarakat';

    public function __invoke(Request $request)
    {
        return view('ppmd/puem/index', [
            'menu' => $this->menu,
            'title' => $this->title,
        ]);
    }
}
