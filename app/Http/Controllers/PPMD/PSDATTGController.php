<?php

namespace App\Http\Controllers\PPMD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PSDATTGController extends Controller
{
    private $menu = 'Pembangunan Dan Pemberdayaan Masyarakat Desa';
    private $title = 'Pemberdayaan Sumber Daya Alam Dan Teknologi Tepat Guna';

    public function __invoke(Request $request)
    {
        return view('ppmd/psdattg/index', [
            'menu' => $this->menu,
            'title' => $this->title,
        ]);
    }
}
