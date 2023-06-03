<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiBroker\PartidoApiBrokerController;
use App\Models\Partido;
use App\Http\Controllers\Controller;
use App\Http\Resources\PartidoCollection;
use App\Models\Torneo;


class PartidoController extends Controller
{
    public function index(int $idTorneo)
	{
		$torneo = Torneo::findOrFail($idTorneo);
		$url = $torneo->url;

        $partidosApiBroker = new PartidoApiBrokerController;
        $partidos = $partidosApiBroker->getTennisPartido($url);

        $partidos = Partido::where('torneo_id', $idTorneo)->get();

		return new PartidoCollection($partidos);
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
        return response()->json(['message' => 'Registros eliminados correctamente.'], 200);
    }
    
}
