<?php

namespace App\Http\Controllers;

use App\Models\Tpoll;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class TpollGuestController extends Controller
{
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
        return Redirect::route('tpolls.show',["tpoll"=>$tpoll->id]);
    }
}
