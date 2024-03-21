<?php

namespace App\Http\Controllers;

use App\Models\GrupoMenu;
use App\Models\Grupo;
use App\Models\Menu;
use Illuminate\Http\Request;
// use Illuminate\Pagination\Paginator;
// use Illuminate\Pagination\LengthAwarePaginator;
// use Illuminate\Pagination\CursorPaginator;
use Illuminate\Database\Eloquent\Collection;

class GrupoMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GrupoMenu  $grupoMenu
     * @return \Illuminate\Http\Response
     */
    public function show(GrupoMenu $grupoMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GrupoMenu  $grupoMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(GrupoMenu $grupoMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GrupoMenu  $grupoMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GrupoMenu $grupoMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GrupoMenu  $grupoMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(GrupoMenu $grupoMenu)
    {
        //
    }

    public function listaGruposMenus()
    {
  
        $gruposMenus = GrupoMenu::orderBy('id_grupo')->paginate(env('PAGINATE'));

        $gruposMenus->withPath('/grupos-menus');
        return view(
            'pages.grupomenus.grupomenus',
            array(
                'gruposMenus' => $gruposMenus,
                'menus' => Menu::orderBy('valor')->get(),
                'grupos' => Grupo::orderBy('nome_grupo')->get(),
                // 'menusPais' => Menu::where('submenu', true)->orderBy('valor')->get(),

            )
        );
    }
}
