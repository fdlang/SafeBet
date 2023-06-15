<?php

namespace App\Http\Controllers\ApiBroker;

use App\Http\Controllers\Controller;
use App\Models\Partido;
use App\Models\torneo;
use Exception;


class TorneoApiBrokerController extends Controller
{
    public function getTennisTorneos()
    {
        $Key = config('apiBroker.key');
        $Content = config('apiBroker.content');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://api.brokersports.club/api/v2/tennis',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                "Authorization: $Key",
                "Content-Type: $Content",
                "Accept: $Content"
            ),
        ));

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        if ($httpCode !== 200) {
            throw new Exception('Error al hacer la petición. Código de respuesta HTTP: ' . $httpCode);
        }

        $data = json_decode($response);
        $id = 1;

        // Obtener los IDs de los torneos existentes en la base de datos
        $existingTorneos = Torneo::pluck('id')->toArray();

        // Eliminar los partidos que no tienen un torneo correspondiente
        Partido::whereNotIn('torneo_id', $existingTorneos)->delete();

        // Obtener los URLs de los torneos existentes en la base de datos
        $existingTorneosUrls = Torneo::pluck('url')->toArray();

        // Obtener los URLs de los torneos presentes en la respuesta de la API
        $apiTorneosUrls = collect($data)->pluck('url')->toArray();

        // Calcular los URLs de los torneos que deben ser eliminados
        $torneosEliminarUrls = array_diff($existingTorneosUrls, $apiTorneosUrls);

        // Obtener los IDs de los torneos que deben ser eliminados
        $torneosEliminarIds = Torneo::whereIn('url', $torneosEliminarUrls)->pluck('id')->toArray();

        // Eliminar los torneos que deben ser eliminados
        Torneo::whereIn('id', $torneosEliminarIds)->delete();


        foreach ($data as $item) {
            $prefix = $item->name[0] . $item->name[1] . $item->name[2];
            if ($prefix === "atp") {
                $id = 1;
            } else if ($prefix === "wta") {
                $id = 2;
            } else if ($prefix === "itf") {
                $id = 3;
            } else if ($prefix === "utr") {
                $id = 4;
            }

            $torneo = Torneo::updateOrCreate(
                ['url' => $item->url],
                [
                    'sport' => $item->sport,
                    'country' => $item->country,
                    'name' => $item->name,
                    'matches' => $item->matches,
                    'categoria_id' => $id
                ]
            );

            // Actualizar los partidos existentes con el ID del nuevo torneo
            Partido::where('urlname_torneo', $item->url)->update(['torneo_id' => $torneo->id]);
        }
    }

}
