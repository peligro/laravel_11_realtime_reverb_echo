<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\EjemploEvent; 
class RealtimeController extends Controller
{
    public function realtime_index()
    {
        return view("realtime.index");
    }
    public function realtime_enviar()
    {
         event(new EjemploEvent("número ".$_GET["num"]." a las ".date('d/m/Y H:i:s')));
        //EjemploEvent::dispatch("hola ".$_GET["num"]);
        return view("realtime.enviar");
    }
}
