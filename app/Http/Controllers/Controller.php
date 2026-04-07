<?php

namespace App\Http\Controllers;

use App\Models\Buku;

abstract class Controller
{
    public function index() {
        $bukus = Buku::with('kategoriBuku')->get();
        return view('bukus.index', compact('bukus'));
    }
}
