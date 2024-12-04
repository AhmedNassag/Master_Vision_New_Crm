<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\LAConfigs;

class ActivePackage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $expire_date = LAConfigs::where('key','end_date')->first();
        $end_date    = Carbon::parse($expire_date->value);
        $now         = Carbon::now();
        if($end_date < $now)
        {
            \Auth::logout();
            return redirect('/login');
        }
        return $next($request);
    }
        
}
