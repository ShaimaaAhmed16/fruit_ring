<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsActive
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
//        dd($request->user('client-web'));
        if (!$request->user('client-web')->status) {
            Auth::logout();
            flash()->error('هذا المستخدم غير مفعل');
            return back();
            //return redirect(route('login.client'));
        }
        return $next($request);
    }
}
