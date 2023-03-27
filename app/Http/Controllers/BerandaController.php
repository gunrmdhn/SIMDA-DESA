<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('index', [
            'berita' => Berita::simplePaginate(3),
        ]);
    }
}
