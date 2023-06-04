<?php

namespace App\Http\Controllers\ApiBroker;

use App\Http\Controllers\Controller;
use App\Models\Partido;
use App\Models\Torneo;
use Exception;


class PartidoApiBrokerController extends Controller
{
    public function getTennisPartido($urlPartidos){

        $Key = config('apiBroker.key');
        $Content = config('apiBroker.content');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $urlPartidos,
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
            throw new Exception('Error al hacer la petición. Código de respuesta HTTP: '.$httpCode);
        }

        $data = json_decode($response);

        if ($data) {
            foreach ($data as $item) {
                if (is_object($item)) {
                    // Buscar el partido por su url
                    $partido = Partido::where('url', $item->match->url)->first();
    
                    $urlnombre_torneo = "http://api.brokersports.club/api/v2".$item->match->breadcrumbs->tournament->url;
                    
                    // Buscar el torneo por su URL
                    $torneo = Torneo::where('url', $urlnombre_torneo)->first();
    
                    if ($torneo) {
                        $torneo_id = $torneo->id;
                    }             
                    
                    if ($partido) {
                        // Actualizar los campos necesarios
                        $partido->is_double = $item->match->{"is-double"};
                        $partido->home_name = $item->match->{"home-name"};
                        $partido->away_name = $item->match->{"away-name"};
                        $partido->url = $item->match->{"url"};
                        $partido->urlname_torneo = $item->match->breadcrumbs->tournament->{"url"};
                        $partido->homeResult = $item->match->{"homeResult"};
                        $partido->awayResult = $item->match->{"awayResult"};
                        $partido->home_winner = $item->match->{"home-winner"};
                        $partido->away_winner = $item->match->{"away-winner"};
                        $partido->info = $item->match->{"info"};
                        $partido->partialresult = $item->match->{"partialresult"};
                        $partido->result = $item->match->{"result"};
                        $partido->country_name = $item->match->{"country-name"};
                        $partido->odds_local = $item->odds[0]->local->avg;
                        $partido->odds_visitor = $item->odds[0]->visitor->avg;
                        $partido->save();
                    } else {
                        // Crear un nuevo partido
                        Partido::create([
                            'torneo_id' => $torneo_id,
                            'is_double' => $item->match->{"is-double"},
                            'home_name' => $item->match->{"home-name"},
                            'away_name' => $item->match->{"away-name"},
                            'url' => $item->match->url,
                            'urlname_torneo' => $item->match->breadcrumbs->tournament->url,
                            'homeResult'  => $item->match->{"homeResult"},
                            'awayResult'  => $item->match->{"awayResult"},
                            'home_winner' => $item->match->{"home-winner"},
                            'away_winner' => $item->match->{"away-winner"},
                            'info' => $item->match->{"info"},
                            'partialresult' => $item->match->{"partialresult"},
                            'result' => $item->match->{"result"},
                            'country_name' => $item->match->{"country-name"},
                            'odds_local' => $item->odds[0]->local->avg,
                            'odds_visitor' => $item->odds[0]->visitor->avg,
                        ]);
                    }
                }
            }
        } else {
            throw new Exception('Error al decodificar la respuesta JSON');
        }
    }
}
