<?php

namespace App\Http\Controllers\PD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APDController extends Controller
{
    private $menu = 'Pemerintahan Desa';
    private $title = 'Administrasi Pemerintahan Desa';

    public function __invoke(Request $request)
    {
        return view('pd/apd/index', [
            'menu' => $this->menu,
            'title' => $this->title,
        ]);
    }
}
