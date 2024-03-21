<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Grupo;
use ReflectionClass;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
Use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ValidatedInput;
use App\Http\Requests\UserRequest;
use App\Http\Requests\MenuRequest;

class SaveObjectController extends Controller
{
    
    // private $arr = array(
    //     'jbjnjk' => 'lkmklmkl',
    //     'jbjbnjk' => md5('jbjknjk')
    // );
    private $User;
    public function __construct(
        User $User,
    ) {
        $this->User = $User;
    }
 
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
    public function update(Request $request)
    {
        // return redirect()->back()->with('data', $request->all());

        $className = "App\Models\\".$request->Object;
        $classNameRequest = "App\Http\Requests\\".$request->Object."Request";

        $id = Session::get('id');
        eval('$model = $className::find($id);');
        // echo "<pre>",print_r([
        //     'previousRouteName' => $request->previous()->getActionName(),
        //     'request' => $request->all()
        // ]),exit;
        if($request->create){
            $model = new $className();
            if(isset($request->password))
                $model->password = Hash::make($request->password);
        }
        if(!isset($request->create) && isset($request->password) && strlen($request->password) >= 8){
            $model->password = Hash::make($request->newPassword ?? $request->password);
            $model->save();
        }

        $campos = $request->except(['Object', '_token', 'create', 'currentPassword', 'password', 'renewpassword']);

        // echo "<pre>",print_r([
        //     'currentPassword' => $request->all(),
        //     'password' => User::where('password', $id)->get()->first()->password,
        //     'id' => Session::get('id')
        // ]),exit;
        if($request->create)
            $er = $this->validateFields($classNameRequest);
        $data = [];
        foreach ($campos as $key => $value) {
            if(gettype($value) == 'object'){
                $pdf = $request->file($key);
                $newName = $id . time() . md5(time()) .  $this->gerarStringAleatoria(10) . '.' . $pdf->getClientOriginalExtension();
                $pdf->move(storage_path('app/'), $newName);
                $model->{$key} = $newName;
            } else {
                $model->{$key} = $value;
                $data[$key] = $value;
            }
        }

        // $validatedData = $request->validate($data);
        // eval('$validate = new $classNameRequest();');
      
        
        
        

        // echo "<pre>",print_r([
        //     'validation' => '$er',
        //     // 'ip' => $request->ip(),
        //     // 'ips' => $request->ips(),
        // ]),exit;
        // if($model->save()){
        //     return redirect()->back();
        // }
        if(isset($request->create)){
            $message = 'Registro criado com sucesso!';
        } else {
            $message = 'Registro atualizado com sucesso';
        }
        try
        {
            $model->save();
            return redirect()->back()->with('status', $message);
        }
        catch(Exception $e)
        {
            // dd($e);
            return redirect()->back()->withInput()->with('status', 'Profile updated!')->withErrors(['custom_error' => 'Custom error message']);

        }
        

        return Response::json(
            [
                'erro' => 'Erro ao salvar',
            ], 500);
    }

    function gerarStringAleatoria($tamanho) {
        $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $stringAleatoria = '';
    
        // Embaralha os caracteres e pega os primeiros $tamanho caracteres
        $caracteresEmbaralhados = str_shuffle($caracteres);
        $stringAleatoria = substr($caracteresEmbaralhados, 0, $tamanho);
    
        return $stringAleatoria;
    }

    public function validateFields($classNameRequest)
    {
        // echo "<pre>",print_r($classNameRequest);exit;
        // Use a função app() para resolver a instância da classe de solicitação
        $request = app($classNameRequest);
    
        // Valide a solicitação
        $validatedData = $request->validated();
    
        // Faça qualquer outra ação necessária, como redirecionar o usuário ou retornar uma resposta
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateOrCreate($campos, $className)
    {
        
        // eval("\$model = new User();");
        // eval('$model = User::find(Auth::user()->id);');
        $model = User::find(Auth::user()->id);

        $toSave = ['name', 'celular', 'avatar'];


        

        foreach ($campos as $key => $value) {
            // echo " | " .$key." |";
            if(in_array($key, $toSave)){
                //echo " | " .$key. " consta no array |";
                $model->{$key} = $value;
            }
        }

        if($model->save())
            return Response::json([
                'salvo' => 'Sucesso',
            ], 200);

       
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function preparaExcluir(Request $request)
    {
        Session::put('id', $request->id);
        Session::put('className', $request->className);
        Session::put('previous', url()->previous());

        return view(
            'pages.excluir',
        );
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function preparaEditar(Request $request)
    {
        Session::put('id', $request->id);
        Session::put('className', $request->className);
        Session::put('previous', url()->previous());

        $arr = explode('-', $request->className);
        $arrModels = [];
        $i = 0;
        foreach($arr as $ar){
            if($i == 0){
                $objectClass = "App\Models\\".$ar;
                eval('$model = $objectClass::find($request->id);');
                $arrModels[strtolower($ar)] = $model;
            } else {
                $objectClass = "App\Models\\".$ar;
                eval('$model = $objectClass::get();');
                $arrModels[strtolower($ar).'s'] = $model;

            }
            $i++;
        }


        $viewName = 'pages.' . strtolower($arr[0]) . 's.' . strtolower($arr[0]) . 's-edit';
        // echo "<pre>",print_r([
        //     'id' => $request->id,
        //     'classname' => $viewName,
        //     'previous' => url()->previous(),
        //     // 'model' => $model,
        //     'arr' => $arrModels
        // ]),exit;

        return view(
            $viewName,
            $arrModels
        );
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmaExcluir(Request $request)
    {
      
        $id = Session::get('id');
        $className = Session::get('className');
        $previous = Session::get('previous');

        $objectClass = "App\Models\\".$className;
        eval('$model = $objectClass::find($id);');


        try
        {
            if($model->delete())
                return redirect()->to(Session::get('previous'))->with('status', 'Registro excluído com sucesso!');
        
        }
        catch(Exception $e)
        {
            return redirect()->to(Session::get('previous'))->with('status_erro', 'Falha ao excluir o registro!');
        }


        if($model->delete())
            return redirect()->to(Session::get('previous'))->with('status', 'Registro excluído com sucesso!');
        else
            return redirect()->to(Session::get('previous'))->with('status_erro', 'Falha ao excluir o registro!');

        echo "<pre>",print_r([
            'id' => $id,
            'className' => $className,
            'previous' => $previous,
            'objectClass' => $objectClass,
            'model' => $model
        ]),exit;

        return view(
            'pages.excluir',
        );
    }
}
