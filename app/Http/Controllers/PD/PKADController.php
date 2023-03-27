<?php

namespace App\Http\Controllers\PD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PKADController extends Controller
{
    private $menu = 'Pemerintahan Desa';
    private $title = 'Pengelolaan Keuangan Dan Aset Desa';

    public function __invoke(Request $request)
    {
        return view('pd/pkad/index', [
            'menu' => $this->menu,
            'title' => $this->title,
        ]);
    }
}
