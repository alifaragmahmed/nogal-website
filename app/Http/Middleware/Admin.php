<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

use Illuminate\Support\Facades\Auth;

class Admin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {  
        $user = Auth::user();
        
        if ($user) { 
            if ($user->role == 'ADMIN')
                return $next($request);
        }

        return redirect("dashboard/login");
    }

}
