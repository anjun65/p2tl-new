<?php

namespace App\Http\Response;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        // replace this with your own code
        // the user can be located with Auth facade

        if (Auth::user()->roles == "ADMIN") {
            $home = route('dashboard');
        } else if (Auth::user()->roles == "ANEV") {
            $home = route('annev-wo');
        } else {
            $home = route('struktural-dashboard');
        }


        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect($home);
    }
}
