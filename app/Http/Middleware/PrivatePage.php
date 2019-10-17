<?php
namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class PrivatePage
{


    /*
    *This middleware filters the requestes to access to the page and allowes
    only the owner, sys_admin and off_admin

    */
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
     

         $id = $request->route('id');
                if (   Auth::user()->id != $id 
                    and Auth::user()->role != 'sys_admin'
                    and Auth::user()->role != 'off_admin'
                ){
                    abort(404);
                }

                return $next($request);
            }
}
