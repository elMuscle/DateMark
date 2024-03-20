<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Tpoll;
use App\Models\Member;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class TpollGuestController extends Controller
{
    public function show(Tpoll $tpoll,Request $request, Member $member_id): View
    {
        //Alle Events aus Datenbank holen
        $events = $tpoll->events()->where('datum', '>=', Carbon::now()->format('Y-m-d'))->orderBy('datum')->get();
        //Alle Nutzer aus Datenbank holen
        $members = Member::all()->sortBy('surname');
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
                $found = false;
                //and then at every member of this event
                foreach ($event->members as $member) {
                    //$found = false;
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



        return view('tpollsguest.show', [
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

    //Enter Member selection to Database
    public function update(Request $request): RedirectResponse
    {
        //check CSRF-Token
        if($request->_token != csrf_token()){
            exit;
        }
        //get all nessesary data
        $data = $request->all();
        $member = Member::find($request->member_id);
        $tpoll = Tpoll::find($request->tpoll_id);
        $events = array_filter(explode(',',$request->events));

        // Detach events  from relationshup
        $member->events()->detach($events);

        //Attach Events with status to member
        foreach ($events as $event) {
            if ($request->$event == 1) {
                continue;
            }
            $member->events()->attach($event,['verfuegbarkeit'=>$request->$event]);
        }


        //$tpoll->update($data);

        //return redirect()->route('tpolls.show',['tpoll_id'=>1]);
        return Redirect::route('tpollsguest.show',["tpoll"=>$tpoll->id, "member_id"=>$member->id,"_token"=>csrf_token()]);
    }

    public function member(Request $request, Member $member): View
    {
        //Get all Members from Database
        $members = Member::all()->sortBy('surname');

        //Check if user is selected
        if (null !== $request->input('member_id')) {

            //Check CSRF-Token is valid
            if($request->_token != csrf_token()){
                exit;
            }

            //Aktueller Nutzer
            $active_member = Member::find($request->input('member_id'));

            if ($active_member->status == 0) {
                exit('user not valid');
            }

            //Get all Events of Member
            $events = $active_member->events()->where('datum', '>=', Carbon::now()->format('Y-m-d'))->orderBy('datum')->get();

        } elseif (null !== $request->member_id) {
            //Check CSRF-Token is valid
            if($request->_token != csrf_token()){
                exit;
            }

            //Aktueller Nutzer
            $active_member = $member;

            if ($active_member->status == 0) {
                exit('user not valid');
            }

            //Get all Events of Member
            $events = $active_member->events()->where('datum', '>=', Carbon::now()->format('Y-m-d'))->orderBy('datum')->get();
        } else {
            $active_member = 0;
            $events = [];

        }

        return view('tpollsguest.user', [
            'members' => $members,
            'events' => $events,
            'active_member' => $active_member,
        ]);
    }

    public function cancel(Request $request): RedirectResponse
    {
        //Check CSRF
        if($request->_token != csrf_token()){
            exit;
        }
        //Find member and event
        $member = Member::find($request->input('member_id'));
        $event = Event::find($request->input('event_id'));
        //remove entry
        $member->events()->detach($event->id);
        //Return view
        return Redirect::route('tpollsguest.member',["member_id"=>$member->id,"_token"=>csrf_token()]);
    }
}
