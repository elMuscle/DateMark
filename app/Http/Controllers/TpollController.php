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

        return view('tpolls.index', [
            'tpolls' => $tpolls,
            'tpolls_active' => $tpolls->where('status', 2),
            'tpolls_edit' => $tpolls->where('status', 1),
            'tpolls_archive' => $tpolls->where('status', 0),
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
    public function show(Tpoll $tpoll,Request $request): View
    {
        //Alle Events aus Datenbank holen
        $events = $tpoll->events()->where('datum', '>=', Carbon::now()->format('Y-m-d'))->orderBy('datum')->get();
        //Alle Nutzer aus Datenbank holen
        $members = Member::all()->sortBy('name');
        // Get all active Members from database
        $active_members = Member::where('status', 1)->orderBy('name')->get(); //members who are set as active in Database
        //Nutzer mit Events abgleichen und nur Nutzer-IDs auflisten, die auch Einträge haben.
        $usedmembers = [];
        foreach($members as $member) {
            foreach ($events as $event) {
                if($member->events->contains($event->id)) {
                    array_push($usedmembers, $member->id);
                }
            }
        }
        //Nutzer mit IDs filtern
        $usedmembers = $members->only($usedmembers);

        if (null !== $request->input('member_id')) {

            if($request->_token != csrf_token()){
                exit;
            }

            //Aktueller Nutzer
            $active_member = Member::find($request->input('member_id'));

            if ($active_member->status == 0) {
                exit('user not valid');
            }

            $active_member_status = [];
            //status of current user for events
            //look at every event
            foreach ($events as $event) {
                //and then at every member of this event
                foreach ($event->members as $member) {
                    $found = false;
                    //when you find a member with id of active member, return the status, else, return 1
                    if ($member->id == $active_member->id) {
                        $status = $member->pivot->verfuegbarkeit;
                        array_push($active_member_status, $status);
                        $found = true;
                    } else {
                        if($found != true) {
                            $found = false;
                        }
                    }
                }
                if ($found == false) {
                    array_push($active_member_status, 1);
                }
            }
        } else {
            $active_member = 0;
            $active_member_status = [];
            foreach ($events as $event) {
                array_push($active_member_status, 1);
            }
        }



        return view('tpolls.show', [
            'tpoll' => $tpoll,
            'members' => $members,
            'usedmembers' => $usedmembers,
            'events' => $events,
            'active_member' => $active_member,
            'active_member_status' => $active_member_status,
            'active_members' => $active_members,
            'tage' => ['So','Mo','Di','Mi','Do','Fr','Sa']
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tpoll $tpoll): View
    {
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
