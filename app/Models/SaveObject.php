<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;
use ReflectionClass;

class SaveObject extends Model
{

    public function updateCreate(Request $request)
    {
        $className = "App\Models\\".$request->Object;

        eval('$model = $className::find(Auth::user()->id);');


        echo "<pre>",print_r([
            'data' => $request->all(),
            'model' => $model
        ]),exit;

        $campos = $request->except(['Object', '_token', 'create']);
        $model = User::find(Auth::user()->id);
        $toSave = ['name', 'celular'];

        foreach ($campos as $key => $value) {
            if(in_array($key, $toSave)){
                $model->{$key} = $value;
            }
        }

        if($request->file('avatar')){
            $pdf = $request->file('avatar');
            $newName = Auth::user()->id . time() . md5(time()) .  $this->gerarStringAleatoria(10) . '.' . $pdf->getClientOriginalExtension();
            $pdf->move(storage_path('app/'), $newName);
            $model->avatar = $newName;
        }

        if($model->save())
            return Response::json([
                'salvo' => 'Sucesso',
            ], 200);
    }
}
