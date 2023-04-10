<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $email = $request->input('email');
        $usuario = Usuario::where('email', $email)->first();

        if(!Session::has('admin')){
            return $next($request);
        } else {
            if(Auth::user()->rol_id != 2){
                return $next($request);
            } else{
                return redirect()
                    ->route('home')
                    ->withInput()
                    ->with('status', 'No tenés las credenciales necesarias para ingresar a esa sección');
            }
    }
}
}