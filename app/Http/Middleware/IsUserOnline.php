<?php

namespace App\Http\Middleware;

use Auth;
use Cache;
use Carbon\Carbon;
use Closure;

class IsUserOnline
{

    public function handle($request, Closure $next)
    {
        // If user logged then create cache data on the 5 minutes.
        if (Auth::check()) {
            $user = Auth::user();
            $expiresAt = Carbon::now()->addMinutes(5);
            Cache::put('user-is-online-' . $user->id, true, $expiresAt);
        }

        return $next($request);
    }

}
