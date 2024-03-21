<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Grupo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(User::all());
        $users = User::orderBy('name')->paginate(env('PAGINATE'));
        $users->withPath('/usuarios');
        return view(
            'pages.users.users',
            array(
                'users' => $users,
                'grupos' => Grupo::orderBy('nome_grupo')->get()

            )
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function usuariosEdit(Request $request)
    {
        //dd(User::all());
        Session::put('id', $request->id);
        // echo "<pre>",print_r([
        //     'model' => '$model',
        //     'key' => Session::get('key'),
        //     'request' => $request->id
        // ]),exit;
        return view(
            'pages.usuarios.usuarios-edit',
            array(
                'user' => User::find($request->id),
                'grupos' => Grupo::orderBy('nome_grupo')->get()

            )
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function meuPerfil()
    {
        //dd(User::all());
        Session::put('id', Auth::user()->id);
        return view(
            'pages.usuarios.perfil',
            array(
                'user' => User::where('id', Auth::user()->id)->get()->first(),
                // 'grupos' => Grupo::orderBy('nome_grupo')->get(),

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getImage($filename)
    {
        
        $path = storage_path('app\\'. $filename);
        // echo "path: " . $path;
        // echo "<br>exits: " .Storage::exists($path);
        // if (!Storage::exists($path)) {
        //     abort(404);
        // }

        return response()->file($path);
    }
}
