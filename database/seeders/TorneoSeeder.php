<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TorneoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "colombia",
        "name" => "wta-bogota",
        "matches" => "(13)",
        "url" => "http://api.brokersports.club/api/v2/tennis/colombia/wta-bogota/",
        "categoria_id" => 2,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
    
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "colombia",
        "name" => "wta-bogota-doubles",
        "matches" => "(5)",
        "url" => "http://api.brokersports.club/api/v2/tennis/colombia/wta-bogota-doubles/",
        "categoria_id" => 2,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
    
        DB::table('torneos')->insert([
        "sport"=> "tennis",
        "country"=> "croatia",
        "name"=> "itf-w40-split-women",
        "matches"=> "(14)",
        "url"=> "http://api.brokersports.club/api/v2/tennis/croatia/itf-w40-split-women/",
        "categoria_id"=> 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
  
        DB::table('torneos')->insert([
        "sport"=> "tennis",
        "country"=> "croatia",
        "name"=> "itf-w40-split-women-doubles",
        "matches"=> "(2)",
        "url"=> "http://api.brokersports.club/api/v2/tennis/croatia/itf-w40-split-women-doubles/",
        "categoria_id"=> 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport"=> "tennis",
        "country"=> "ecuador",
        "name"=> "itf-m15-santo-domingo-de-los-tsachilas-men",
        "matches"=> "(3)",
        "url"=> "http://api.brokersports.club/api/v2/tennis/ecuador/itf-m15-santo-domingo-de-los-tsachilas-men/",
        "categoria_id"=> 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
    
        DB::table('torneos')->insert([
        "sport"=> "tennis",
        "country"=> "egypt",
        "name"=> "itf-m15-sharm-elsheikh-10-men-doubles",
        "matches"=> "(6)",
        "url"=> "http://api.brokersports.club/api/v2/tennis/egypt/itf-m15-sharm-elsheikh-10-men-doubles/",
        "categoria_id"=> 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport"=> "tennis",
        "country"=> "egypt",
        "name"=> "itf-w15-sharm-elsheikh-10-women-doubles",
        "matches"=> "(6)",
        "url"=> "http://api.brokersports.club/api/v2/tennis/egypt/itf-w15-sharm-elsheikh-10-women-doubles/",
        "categoria_id"=> 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
    
        DB::table('torneos')->insert([
        "sport"=> "tennis",
        "country"=> "france",
        "name"=> "itf-m15-lons-le-saunier-men",
        "matches"=> "(8)",
        "url"=> "http://api.brokersports.club/api/v2/tennis/france/itf-m15-lons-le-saunier-men/",
        "categoria_id"=> 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport"=> "tennis",
        "country"=> "france",
        "name"=> "itf-m15-lons-le-saunier-men-doubles",
        "matches"=> "(2)",
        "url"=> "http://api.brokersports.club/api/v2/tennis/france/itf-m15-lons-le-saunier-men-doubles/",
        "categoria_id"=> 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
  
        DB::table('torneos')->insert([
        "sport"=> "tennis",
        "country"=> "india",
        "name"=> "itf-m15-chennai-men",
        "matches"=> "(4)",
        "url"=> "http://api.brokersports.club/api/v2/tennis/india/itf-m15-chennai-men/",
        "categoria_id"=> 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport"=> "tennis",
        "country"=> "india",
        "name"=> "itf-m15-chennai-men-doubles",
        "matches"=> "(4)",
        "url"=> "http://api.brokersports.club/api/v2/tennis/india/itf-m15-chennai-men-doubles/",
        "categoria_id"=> 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport"=> "tennis",
        "country"=> "italy",
        "name"=> "itf-m25-santa-margherita-di-pula-men",
        "matches"=> "(11)",
        "url"=> "http://api.brokersports.club/api/v2/tennis/italy/itf-m25-santa-margherita-di-pula-men/",
        "categoria_id"=> 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport"=> "tennis",
        "country"=> "italy",
        "name"=> "itf-m25-santa-margherita-di-pula-men-doubles",
        "matches"=> "(8)",
        "url"=> "http://api.brokersports.club/api/v2/tennis/italy/itf-m25-santa-margherita-di-pula-men-doubles/",
        "categoria_id"=> 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport"=> "tennis",
        "country"=> "italy",
        "name"=> "itf-w25-santa-margherita-di-pula-women",
        "matches"=> "(5)",
        "url"=> "http://api.brokersports.club/api/v2/tennis/italy/itf-w25-santa-margherita-di-pula-women/",
        "categoria_id"=> 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
  
        DB::table('torneos')->insert([
        "sport"=> "tennis",
        "country"=> "italy",
        "name"=> "itf-w25-santa-margherita-di-pula-women-doubles",
        "matches"=> "(3)",
        "url"=> "http://api.brokersports.club/api/v2/tennis/italy/itf-w25-santa-margherita-di-pula-women-doubles/",
        "categoria_id"=> 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
    
        DB::table('torneos')->insert([
        "sport"=> "tennis",
        "country"=> "italy",
        "name"=> "barletta-challenger-men",
        "matches"=> "(14)",
        "url"=> "http://api.brokersports.club/api/v2/tennis/italy/barletta-challenger-men/",
        "categoria_id"=> 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
    
        DB::table('torneos')->insert([
        "sport"=> "tennis",
        "country"=> "italy",
        "name"=> "barletta-challenger-men-doubles",
        "matches"=> "(8)",
        "url"=> "http://api.brokersports.club/api/v2/tennis/italy/barletta-challenger-men-doubles/",
        "categoria_id"=> 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport"=> "tennis",
        "country"=> "japan",
        "name"=> "itf-m25-kashiwa-men",
        "matches"=> "(7)",
        "url"=> "http://api.brokersports.club/api/v2/tennis/japan/itf-m25-kashiwa-men/",
        "categoria_id"=> 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
    
        DB::table('torneos')->insert([
        "sport"=> "tennis",
        "country"=> "japan",
        "name"=> "itf-m25-kashiwa-men-doubles",
        "matches"=> "(6)",
        "url"=> "http://api.brokersports.club/api/v2/tennis/japan/itf-m25-kashiwa-men-doubles/",
        "categoria_id"=> 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
    
        DB::table('torneos')->insert([
        "sport"=> "tennis",
        "country"=> "japan",
        "name"=> "itf-w25-kashiwa-women",
        "matches"=> "(4)",
        "url"=> "http://api.brokersports.club/api/v2/tennis/japan/itf-w25-kashiwa-women/",
        "categoria_id"=> 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "japan",
        "name" => "itf-w25-kashiwa-women-doubles",
        "matches"=> "(7)",
        "url" => "http://api.brokersports.club/api/v2/tennis/japan/itf-w25-kashiwa-women-doubles/",
        "categoria_id" => 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
    
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "mexico",
        "name" => "san-luis-potosi-challenger-men",
        "matches" => "(13)",
        "url" => "http://api.brokersports.club/api/v2/tennis/mexico/san-luis-potosi-challenger-men/",
        "categoria_id" => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
    
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "morocco",
        "name" => "atp-marrakech",
        "matches" => "(10)",
        "url" => "http://api.brokersports.club/api/v2/tennis/morocco/atp-marrakech/",
        "categoria_id" => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "morocco",
        "name" => "atp-marrakech-doubles",
        "matches" => "(7)",
        "url" => "http://api.brokersports.club/api/v2/tennis/morocco/atp-marrakech-doubles/",
        "categoria_id" => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
    
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "portugal",
        "name" => "atp-estoril",
        "matches" => "(10)",
        "url" => "http://api.brokersports.club/api/v2/tennis/portugal/atp-estoril/",
        "categoria_id" => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
    
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "portugal",
        "name" => "atp-estoril-doubles",
        "matches" => "(7)",
        "url" => "http://api.brokersports.club/api/v2/tennis/portugal/atp-estoril-doubles/",
        "categoria_id" => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "singapore",
        "name" => "itf-m15-singapore-men",
        "matches" => "(4)",
        "url" => "http://api.brokersports.club/api/v2/tennis/singapore/itf-m15-singapore-men/",
        "categoria_id" => 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
    
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "singapore",
        "name" => "itf-m15-singapore-men-doubles",
        "matches" => "(6)",
        "url" =>"http://api.brokersports.club/api/v2/tennis/singapore/itf-m15-singapore-men-doubles/",
        "categoria_id" => 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "singapore",
        "name" => "itf-w15-singapore-women",
        "matches" => "(10)",
        "url" => "http://api.brokersports.club/api/v2/tennis/singapore/itf-w15-singapore-women/",
        "categoria_id" => 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
    
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "singapore",
        "name" => "itf-w15-singapore-women-doubles",
        "matches" => "(3)",
        "url" => "http://api.brokersports.club/api/v2/tennis/singapore/itf-w15-singapore-women-doubles/",
        "categoria_id" => 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "spain",
        "name" => "itf-m25-reus-men",
        "matches" => "(6)",
        "url" => "http://api.brokersports.club/api/v2/tennis/spain/itf-m25-reus-men/",
        "categoria_id" => 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "spain",
        "name" => "itf-m25-reus-men-doubles",
        "matches" => "(2)",
        "url" => "http://api.brokersports.club/api/v2/tennis/spain/itf-m25-reus-men-doubles/",
        "categoria_id" => 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
    
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "spain",
        "name" => "itf-w15-telde-women",
        "matches" => "(1)",
        "url" => "http://api.brokersports.club/api/v2/tennis/spain/itf-w15-telde-women/",
        "categoria_id" => 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "spain",
        "name" => "itf-w15-telde-women-doubles",
        "matches" => "(5)",
        "url" => "http://api.brokersports.club/api/v2/tennis/spain/itf-w15-telde-women-doubles/",
        "categoria_id" => 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "spain",
        "name" => "murcia-challenger-men",
        "matches" => "(13)",
        "url" => "http://api.brokersports.club/api/v2/tennis/spain/murcia-challenger-men/",
        "categoria_id" => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);

        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "spain",
        "name" => "murcia-challenger-men-doubles",
        "matches" => "(8)",
        "url" => "http://api.brokersports.club/api/v2/tennis/spain/murcia-challenger-men-doubles/",
        "categoria_id" => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "turkey",
        "name" => "itf-m15-antalya-10-men",
        "matches" => "(4)",
        "url" => "http://api.brokersports.club/api/v2/tennis/turkey/itf-m15-antalya-10-men/",
        "categoria_id" => 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
    
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "turkey",
        "name" => "itf-m15-antalya-10-men-doubles",
        "matches" => "(4)",
        "url" => "http://api.brokersports.club/api/v2/tennis/turkey/itf-m15-antalya-10-men-doubles/",
        "categoria_id" => 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
  
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "turkey",
        "name" => "itf-w15-antalya-10-women",
        "matches" => "(3)",
        "url" => "http://api.brokersports.club/api/v2/tennis/turkey/itf-w15-antalya-10-women/",
        "categoria_id" => 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "turkey",
        "name" => "itf-w15-antalya-10-women-doubles",
        "matches" => "(5)",
        "url" => "http://api.brokersports.club/api/v2/tennis/turkey/itf-w15-antalya-10-women-doubles/",
        "categoria_id" => 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "usa",
        "name" => "itf-w25-jackson-ms-women",
        "matches" => "(8)",
        "url" => "http://api.brokersports.club/api/v2/tennis/usa/itf-w25-jackson-ms-women/",
        "categoria_id" => 3,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
  
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "usa",
        "name" => "wta-charleston",
        "matches" => "(20)",
        "url" => "http://api.brokersports.club/api/v2/tennis/usa/wta-charleston/",
        "categoria_id" => 2,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
    
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "usa",
        "name" => "atp-houston",
        "matches" => "(10)",
        "url" => "http://api.brokersports.club/api/v2/tennis/usa/atp-houston/",
        "categoria_id" => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "usa",
        "name" => "atp-houston-doubles",
        "matches" => "(6)",
        "url" => "http://api.brokersports.club/api/v2/tennis/usa/atp-houston-doubles/",
        "categoria_id" => 1,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
   
        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "usa",
        "name" => "wta-charleston-doubles",
        "matches" => "(7)",
        "url" => "http://api.brokersports.club/api/v2/tennis/usa/wta-charleston-doubles/",
        "categoria_id" => 2,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);

        DB::table('torneos')->insert([
        "sport" => "tennis",
        "country" => "spain",
        "name" => "atp-madrid",
        "matches" => "(3)",
        "url" => "http://api.brokersports.club/api/v2/tennis/spain/atp-madrid/",
        "categoria_id" => 2,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
    }
}