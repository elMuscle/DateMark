<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tpoll;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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

        // Check for expired edit locks and reset status
        foreach ($tpolls as $tpoll) {
            if ($tpoll->status == 1) {
                $lock = Cache::get('tpoll_edit_lock_' . $tpoll->id);
                $isLocked = $lock && now()->diffInMinutes($lock['timestamp']) < 10;
                if (!$isLocked) {
                    $tpoll->status = 2;
                    $tpoll->save();
                }
            }
        }

        return view('home.auswahl', [
            'tpolls' => $tpolls,
            'tpolls_active' => $tpolls->where('status', 2),
            'tpolls_edit' => $tpolls->where('status', 1),
            'tpolls_archive' => $tpolls->where('status', 0),
            'today' => $today,
        ]);
    }
}
