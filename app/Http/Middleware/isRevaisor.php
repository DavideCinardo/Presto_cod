<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isRevaisor
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
        if(Auth::check() && Auth::user()->is_revaisor){
            return $next($request);
        } elseif (Auth::check()){
            return redirect(route('homepage'))->with('notAccessArea', 'Non sei revisore, invia la tua richiesta cliccando qui :');
        }

        return redirect(route('homepage'))->with('accessRevaisor', 'Solo i revisori possono accedere a quest\'area, se lo sei accedi da qui');
    }
}
