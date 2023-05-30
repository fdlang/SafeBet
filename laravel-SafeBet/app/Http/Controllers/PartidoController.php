<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiBroker\PartidoApiBrokerController;
use App\Models\Partido;
use App\Http\Controllers\Controller;
use App\Http\Resources\PartidoCollection;
use App\Models\Torneo;
use Illuminate\Http\Request;


class PartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $idTorneo)
    {       
        $torneo = Torneo::findOrFail($idTorneo);
        $url = $torneo->url;

        // Verificar si ya existen partidos en la base de datos
        $partidos = Partido::where('torneo_id', $idTorneo)->get();

        if($partidos->count() == 0) {
            // No existen partidos en la base de datos, obtenerlos del servicio externo
            $partidosApiBroker = new PartidoApiBrokerController;
            $partidosApiBroker->getTennisPartido($url);

            $partidos = Partido::where('torneo_id', $idTorneo)->get();
    }

    return new PartidoCollection($partidos);
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Partido $partido)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Partido $partido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partido $partido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partido $partido)
    {
        $partidosApi = Partido::select('id')->where('source', 'api')->get()->pluck('id')->toArray();
        $partidosToDelete = Partido::whereNotIn('id', $partidosApi)->get();
    
        foreach ($partidosToDelete as $partido) {
            $partido->delete();
        }  
        return response()->json(['message' => 'Registros eliminados correctamente.']);
    }
    
}
