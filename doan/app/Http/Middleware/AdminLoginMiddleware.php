<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware
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
        if(Auth::check())
        {
            $user =Auth::user();
            if($user->CapDoID ==1)
            return $next($request);
            else
            return redirect('admin/dangnhap');
        }
       else return redirect('admin/dangnhap');
    }
}
