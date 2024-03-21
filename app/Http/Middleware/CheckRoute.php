<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\MenuController;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
use App\Models\Menu;
use App\Models\User;
use App\Models\Psicologo;
use App\Models\GrupoMenu;
use Illuminate\Support\Facades\Auth;
use Illuminate \ Database \ QueryException;
 

class CheckRoute
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
        
        try{
            $permission = GrupoMenu::join('menus', 'menus.id_menu', 'grupos_menus.id_menu')
                ->join('grupos', 'grupos.id_grupo', 'grupos_menus.id_grupo')
                ->join('users', 'users.id_grupo', 'grupos.id_grupo')
                ->select('menus.id_menu', 'icone', 'chave', 'valor', 'submenu', 'submenugroup', 'menus.numero_ordenacao')
                ->distinct('menus.id_menu')
                ->where('grupos_menus.id_grupo', Auth::user()->id_grupo)
                ->where('chave', Route::currentRouteName())
                ->orderBy('menus.numero_ordenacao')
                ->get()
                ->toArray();

            if (count($permission) > 0) {
                return $next($request);
            }
            return redirect('sem-permissao');

        } catch (QueryException $e) {
            // Handle the QueryException
            Log::error('QueryException: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while executing the query.'], 500);
        }
        
    }
}
