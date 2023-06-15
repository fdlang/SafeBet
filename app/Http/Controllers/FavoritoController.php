<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use App\Http\Controllers\Controller;
use App\Models\FavoritoPartido;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoritoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        
        // Obtener los partidos seleccionados
        $partidos = $request->partidos;

        // Verificar si los partidos ya existen como favoritos para el usuario actual
        $existingPartidos = FavoritoPartido::where('favorito_id', function ($query) use ($userId) {
            $query->select('id')
                ->from('favoritos')
                ->where('user_id', $userId);
        })->whereIn('partido_id', collect($partidos)->pluck('id'))
        ->get();

        $existingPartidosIds = $existingPartidos->pluck('partido_id')->toArray();

        // Verificar si ya existe un favorito para el usuario actual
        $favorito = Favorito::where('user_id', $userId)->first();

        if ($favorito) {
            $favoritoId = $favorito->id;
        } else {
            // Crear un nuevo favorito para el usuario actual
            $favorito = new Favorito;
            $favorito->user_id = $userId;
            $favorito->save();
            $favoritoId = $favorito->id;
        }
        // Crear nuevos registros de FavoritoPartido para los partidos no existentes
        $favoritoPartidos = [];

        foreach ($partidos as $partido) {
            if (!in_array($partido['id'], $existingPartidosIds)) {
                $favoritoPartidos[] = [
                    'favorito_id' => $favoritoId,
                    'partido_id' => $partido['id'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ];
            }
        }

        if (count($favoritoPartidos) === 0) {
            return response()->json(['message' => 'El partido ya existen como favorito.'], 400);
        }
        // Insertar los nuevos registros de FavoritoPartido
        FavoritoPartido::insert($favoritoPartidos);

        return response()->json(['message' => 'Agregando a favoritos']);
    }

    /**
     * Display the favorite resource for the authenticated user.
     */
    public function show()
    {
        if (Auth::check()) {
            $userId = Auth::id();

            $partidos = DB::table('partidos')
                ->join('favorito_partidos', 'partidos.id', '=', 'favorito_partidos.partido_id')
                ->join('favoritos', 'favoritos.id', '=', 'favorito_partidos.favorito_id')
                ->where('favoritos.user_id', $userId)
                ->select('partidos.*')
                ->get();

            return response()->json(['partidos' => $partidos]);
        }
        return response()->json(['message' => 'Usuario no autenticado.'], 401);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $partidoId = $id;  
        $favoritoPartido = FavoritoPartido::where('partido_id', $partidoId)->first();
        
        if ($favoritoPartido) {
            $favoritoPartido->delete();
            
            return response()->json(['message' => 'Eliminando de favoritos.']);
        }     
        return response()->json(['message' => 'No se encontró el favorito.']);
    }
}
