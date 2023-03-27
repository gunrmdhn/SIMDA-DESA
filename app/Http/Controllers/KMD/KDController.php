<?php

namespace App\Http\Controllers\KMD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KDController extends Controller
{
    private $menu = 'Kelembagaan Masyarakat Desa';
    private $title = 'Kelembagaan Desa';

    public function __invoke(Request $request)
    {
        return view('kmd/kd/index', [
            'menu' => $this->menu,
            'title' => $this->title,
        ]);
    }
}
