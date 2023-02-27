<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Tpoll;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreEventRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Requests\UpdateMemberRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //Get all Events
        $events = Event::all()->sortBy('datum');
        $tpolls = Tpoll::all();

        return view('events.index', [
            'events' => $events,
            'tpolls' => $tpolls,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        $tpolls = Tpoll::all();
        return view('events.create',[
            'tpolls' => $tpolls,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request): RedirectResponse
    {
        //
        $data = $request->validated();

        Event::create($data);

        return redirect()->route('tpolls.show', ['tpoll' => $data['tpoll_id']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event): View
    {
        //
        return view('events.show',[
            'event' => $event,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event): View
    {
        //
        return view('events.edit', [
            'event' => $event,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event): RedirectResponse
    {
        //
        $data = $request->validated();

        $event->update($data);

        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event): RedirectResponse
    {
        //
        Event::destroy($event->id);
        return Redirect::route('events.index');
    }
}
