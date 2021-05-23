<?php

namespace App\Http\Middleware;

use Closure;
use TCG\Voyager\Models\Role;
class SingerAuth
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function handle($request, Closure $next, $guard = null) {
      $singerRole = Role::whereName('singer')->firstOrFail();
      
      if (auth()->guard($guard)->check() && auth()->guard($guard)->user()->role_id == $singerRole->id) {
        return $next($request);
      }
      
       return redirect('/')->with('error', 'only singers can view it');
    }
}
