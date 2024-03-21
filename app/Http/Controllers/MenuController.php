<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\GrupoMenu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return GrupoMenu::join('menus', 'menus.id_menu', 'grupos_menus.id_menu')
        ->join('grupos', 'grupos.id_grupo', 'grupos_menus.id_grupo')
        ->join('users', 'users.id_grupo', 'grupos.id_grupo')
        ->select('menus.id_menu', 'icone', 'chave', 'valor', 'submenu', 'submenugroup', 'menus.numero_ordenacao', 'menus.visible')
        ->distinct('menus.id_menu')
        ->where('grupos_menus.id_grupo', Auth::user()->id_grupo)
        ->where('menus.visible', true)
        ->orderBy('menus.numero_ordenacao')
        ->get();

                // echo "<pre>", print_r([
        //     'Route::current()' => Route::currentRouteName(),
        //     'permission' => count($permission),
        //     // 'permission2' => $permission
        // ],1),exit;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function menusEdit(Request $request)
    {
        //dd(User::all());
        Session::put('id', $request->id);
        // echo "<pre>",print_r([
        //     'model' => '$model',
        //     'key' => Session::get('key'),
        //     'request' => $request->id
        // ]),exit;
        return view(
            'pages.menus.menus-edit',
            array(
                'menu' => Menu::find($request->id),
                'menusPais' => Menu::where('submenu', true)->orderBy('valor')->get(),

            )
        );
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
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }

    public function actualRoute()
    {
       return trim(Route::current()->getName());
    }

    public function listaMenus()
    {
        $menu = Menu::orderBy('valor')->paginate(env('PAGINATE'));
        $menu->withPath('/menus');
        return view(
            'pages.menus.menus',
            array(
                'menus' => $menu,
                'menusPais' => Menu::where('submenu', true)->orderBy('valor')->get(),

            )
        );
    }


}
