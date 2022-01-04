<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class LoginCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        if ((Cookie::get('logermail')) &&  (Cookie::get('usersnNumber')) && (Cookie::get('loggerType'))) {

            $type = (Cookie::get('loggerType'));
            if ($type == 'voter') {
                return redirect('/advertise')->with('updateMsg', 'To Create new coin, you must have an Influencer / Coin Owner account. Send Message to us, admin will promote you as a Coin Owner');
            } else {
                return $next($request);
            }
        } else {
            return redirect('/login');
        }
    }
}
