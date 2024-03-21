<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
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
        $origins = [
            'https://www.clinica.agathonpsicologia.com.br',
            'http://www.clinica.agathonpsicologia.com.br',
            'https://clinica.agathonpsicologia.com.br',
            'http://clinica.agathonpsicologia.com.br',
            'https://app.zapsign.com.br',
            'http://app.zapsign.com.br',
            'https://www.app.zapsign.com.br',
            'http://www.app.zapsign.com.br',
            'http://localhost:5000'
        ];

        $origin = $origins[0];
        
        if (in_array($request->header('origin'), $origins)) {
            $origin = $request->header('origin');
        }
        // <<corrigir>>
        return $next($request)
            // ->header('Access-Control-Allow-Origin', '*')
            // ->header('Access-Control-Allow-Methods', 'PUT, POST, DELETE, GET, OPTIONS')
            // ->header('Access-Control-Allow-Headers', 'Accept, Authorization, Content-Type')
            ;
    }
}