<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use App\Models\User;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if(Auth::check() && Auth::user()->isban){
        //     $banned = Auth::user()->isban == '1';
        //     Auth::logout();
        //     if($banned == 1){
        //         $message = "Your Account has been Banned.Please Contact with Admin";
        //     }

        //     return redirect()->route('login')->with('status', $message)->withErrors([
        //         'email' => 'Your Account Has been Banned'
        //     ]);

        // }
        // else{
        //     return redirect()->route('login');
        // }

        // if(Auth::check()){
        //     $exptime = Carbon::now()->addSeconds(30); //30 secoand dhore kono user kaj na korle take in active dekhabe
        //     Cache::put('user-is-online' . Auth::user()->id, true ,$exptime);
        //     User::where('id',Auth::user()->id)->update(['last_seen' => Carbon::now()]);
        // }


    }


}
