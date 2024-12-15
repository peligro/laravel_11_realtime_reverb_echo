<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ejemplo;
use App\Events\EventoBaseDeDatosEvent;
class RealtimeFormularioController extends Controller
{
    public function realtime_bd_index()
    {
        $datos=Ejemplo::orderBy('id', 'desc')->get();
        return view("realtime_bd.index")->with(['datos'=>$datos]);
    }
    public function realtime_bd_enviar()
    {
        return view("realtime_bd.enviar");
    }
    public function realtime_bd_enviar_post(Request $request)
    {
        $validate = $request->validate(
            [
                'mensaje'=>'required|min:6',
            ],
            [
                'mensaje.required'=>'El campo mensaje está vacío',
                'mensaje.min'=>'El campo mensaje debe tener al menos 6 caracteres'
            ]);
            EventoBaseDeDatosEvent::dispatch($request);
            /*$save=new Ejemplo ;
            $save->mensaje=$request->mensaje;
            $save->save();*/
            return redirect()->route('realtime_bd_enviar')->with(['css'=>'success', 'mensaje'=>'Se creó el registro exitosamente']);
    }
}
