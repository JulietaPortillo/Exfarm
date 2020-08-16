<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class Auth
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
        $user = User::get()
                ->where('email', $request->email)
                ->where('password', $request->password);
        
        if ($user) {
            return view('purchases.index');
        } else {
            return view('/')
                    ->with('message', 'Usuario no autenticado');
        }

        return $next($request);
    }
}
