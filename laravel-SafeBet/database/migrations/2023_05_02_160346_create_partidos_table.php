<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('torneo_id')->references('id')->on('torneos')->onDelete('cascade');
            $table->string('url');
            $table->string('urlname_torneo');
            $table->boolean('is_double');
            $table->string('home_name');
            $table->string('away_name');
            $table->string('homeResult');
            $table->string('awayResult');
            $table->string('home_winner')->nullable();
            $table->string('away_winner')->nullable();
            $table->text('info')->nullable()->default(null);
            $table->string('partialresult');
            $table->string('result');
            $table->string('country_name');
            $table->double('odds_local')->nullable();
            $table->double('odds_visitor')->nullable();
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidos');
    }
};
