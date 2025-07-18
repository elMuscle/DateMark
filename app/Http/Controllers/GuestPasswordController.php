<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GuestPasswordController extends Controller
{
    public function showForm(Request $request)
    {
        $redirect = $request->query('redirect', url('/'));
        return view('tpollsguest.guest_password', ['redirect' => $redirect]);
    }

    public function verify(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'redirect' => 'required|url',
        ]);

        if ($request->password === env('GUEST_ACCESS_PASSWORD')) {
            Session::put('guest_authenticated', true);
            return redirect($request->redirect);
        }

        return back()->withErrors(['password' => __('Incorrect password') ])->withInput();
    }
}
