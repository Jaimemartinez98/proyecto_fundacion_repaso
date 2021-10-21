<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificarRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$perfil)
    {
        if ((in_array($request->user()->rol_id,$perfil)==false)) {
            return redirect('home')->with('acceso_denegado','No tienes acceso a esta sección');
        }
        return $next($request);
    }
}
