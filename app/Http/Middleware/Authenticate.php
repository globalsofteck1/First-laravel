<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as IlluminateAuthenticate;

class Authenticate extends IlluminateAuthenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        
        if (!auth()->check()) {
            //dd(auth()->user());
            //return redirect('/login');
        }
        return parent::handle($request, $next, ...$guards);
    }
}
