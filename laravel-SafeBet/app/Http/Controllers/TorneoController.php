<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiBroker\TorneoApiBrokerController;
use App\Models\Torneo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TorneoCollection;

class TorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $torneos = new TorneoApiBrokerController;
        $torneos->getTennisTorneos();
        
        return new TorneoCollection(Torneo::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newTorneo = new Torneo($request->all());

        // Buscar si ya existe un torneo con el mismo nombre y país
        $existingTorneo = Torneo::where('name', $newTorneo->name)
                                ->where('country', $newTorneo->country)
                                ->first();

        // Si existe, actualiza los datos del torneo existente en lugar de crear uno nuevo
        if ($existingTorneo) {
            $existingTorneo->sport = $newTorneo->sport;
            $existingTorneo->matches = $newTorneo->matches;
            $existingTorneo->url = $newTorneo->url;
            $existingTorneo->categoria_id = $newTorneo->categoria_id;
            $existingTorneo->save();

            return response()->json(['message' => 'Torneo actualizado correctamente'], 200);
        }

        $newTorneo->save();

        return response()->json(['message' => 'Torneo creado correctamente'], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Torneo $torneo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Torneo $torneo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {    
        $torneosApi = Torneo::select('id')->where('source', 'api')->get()->pluck('id')->toArray();
        $torneosToDelete = Torneo::whereNotIn('id', $torneosApi)->get();
    
        foreach ($torneosToDelete as $torneo) {
            $torneo->delete();
        }  
        return response()->json(['message' => 'Registros eliminados correctamente.']);
    }
    
    
}
