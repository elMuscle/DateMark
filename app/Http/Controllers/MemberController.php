<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $members = Member::all()->sortBy('surname');

        return view('members.index', [
            'members' => $members,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request): RedirectResponse
    {
        //
        $data = $request->validated();

        Member::create($data);

        return redirect()->route('members.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member): RedirectResponse
    {
        return Redirect::route('members.edit',['member'=>$member]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member): View
    {
        //
        return view('members.edit', [
            'member' => $member,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, Member $member): RedirectResponse
    {
        //
        $data = $request->validated();

        $member->update($data);

        return redirect()->route('members.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member): RedirectResponse
    {
        //
        Member::destroy($member->id);
        return Redirect::route('members.index');
    }
}
