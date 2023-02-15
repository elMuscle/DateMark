<?php

namespace App\Http\Controllers;

use App\Models\Tpoll;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function auswahl() {
    //     return view('auswahl');
    // }

    public function datenschutz() {
        // return view('datenschutz');
        return view('home.datenschutz');
    }

    public function cookies() {
        return view('home.cookies');
    }

    public function auswahl() {
        $tpolls = Tpoll::all()->sortByDesc('id');

        return view('home.auswahl', [
            'tpolls' => $tpolls,
            'tpolls_active' => $tpolls->where('status', 2),
            'tpolls_edit' => $tpolls->where('status', 1),
            'tpolls_archive' => $tpolls->where('status', 0),
        ]);
    }
}
