<?php

namespace App\Events;
use Illuminate\Http\Request;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Ejemplo;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
class EventoBaseDeDatosEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public  Request $request;
    public Ejemplo $datos;
    /**
     * Create a new event instance.
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $save=new Ejemplo ;
        $save->mensaje=$request->mensaje;
        $save->estado=0;
        $save->fecha=date("Y-m-d H:i:s");
        $save->save();
        $this->datos=$save;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): Channel
    {
        return new Channel('mi_canal_bd');
    }
}
