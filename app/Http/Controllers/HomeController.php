<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tpoll;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function auswahl() {
    //     return view('auswahl');
    // }

    public function datenschutz(): View
    {
        // return view('datenschutz');
        return view('home.datenschutz');
    }

    public function cookies(): View
    {
        return view('home.cookies');
    }

    public function auswahl(): View
    {
        $tpolls = Tpoll::all()->sortByDesc('id');
        $today = Carbon::now()->format('Y-m-d');

        return view('home.auswahl', [
            'tpolls' => $tpolls,
            'tpolls_active' => $tpolls->where('status', 2),
            'tpolls_edit' => $tpolls->where('status', 1),
            'tpolls_archive' => $tpolls->where('status', 0),
            'today' => $today,
        ]);
    }
}
