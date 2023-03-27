<?php

namespace App\Http\Controllers\PKP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PPKPController extends Controller
{
    private $menu = 'Pembangunan Kawasan Perdesaan';
    private $title = 'Perencanaan Pembangunan Kawasan Perdesaan';

    public function __invoke(Request $request)
    {
        return view('pkp/ppkp/index', [
            'menu' => $this->menu,
            'title' => $this->title,
        ]);
    }
}
