<?php

namespace App\Http\Middleware;

use App\Models\BindUserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        $bindUserRole = BindUserRole::where('user_id', $user->id)->first();
        if($bindUserRole->role_id == 2){
            return $next($request);
        }else{
            return redirect()->intended('/');
        }

    }
}
