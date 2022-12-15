<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AutenticacaoMiddleware
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

        $user = Auth::user()->tipo;

        //verifica se o usuário possui acesso a rota
        if ($user == 0) {
            return $next($request);
        } else {
            return Response('Acesso negado! Rota exige autenticação de ADM!!!');
        }
    }
}
