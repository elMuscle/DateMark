<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class GuestPasswordMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Authenticated users can proceed
            return $next($request);
        }

        if (Session::get('guest_authenticated')) {
            // Guest has already authenticated with password
            return $next($request);
        }

        // Redirect to guest password form
        return redirect()->route('guest.password.form', ['redirect' => $request->fullUrl()]);
    }
}
