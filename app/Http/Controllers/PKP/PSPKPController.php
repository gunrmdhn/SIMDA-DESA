<?php

namespace App\Http\Controllers\PKP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PSPKPController extends Controller
{
    private $menu = 'Pembangunan Kawasan Perdesaan';
    private $title = 'Pengembangan Sarana Dan Prasarana Kawasan Perdesaan';

    public function __invoke(Request $request)
    {
        return view('pkp/pspkp/index', [
            'menu' => $this->menu,
            'title' => $this->title,
        ]);
    }
}
