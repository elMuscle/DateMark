<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tpoll;
use App\Models\Member;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreTpollRequest;
use App\Http\Requests\UpdateTpollRequest;

class TpollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $tpolls = Tpoll::all()->sortByDesc('id');
        $today = Carbon::now()->format('Y-m-d');

        return view('tpolls.index', [
            'tpolls' => $tpolls,
            'tpolls_active' => $tpolls->where('status', 2),
            'tpolls_edit' => $tpolls->where('status', 1),
            'tpolls_archive' => $tpolls->where('status', 0),
            'today' => $today,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('tpolls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTpollRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Tpoll::create($data);

        return redirect()->route('tpolls.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tpoll $tpoll): View
    {
        //Get tpoll's events
        $events = $tpoll->events()->get();
        return view('tpolls.show', [
            'tpoll' => $tpoll,
            'events' => $events,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tpoll $tpoll): View
    {
        // change tpoll status
        $tpoll->status = 1;
        $tpoll->save();
        //
        return view('tpolls.edit', [
            'tpoll' => $tpoll
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTpollRequest $request, Tpoll $tpoll): RedirectResponse
    {
        //
        $data = $request->validated();

        $tpoll->update($data);

        return redirect()->route('tpolls.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tpoll $tpoll): RedirectResponse
    {
        //
        return redirect()->route('tpolls.index');
    }
}
