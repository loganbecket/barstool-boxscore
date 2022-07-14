<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('league');
            $table->string('venue');
            $table->integer('attendance')->nullable();
            $table->dateTime('start_date_time');
            $table->string('home_team_id');
            $table->string('home_logo');
            $table->string('away_team_id');
            $table->string('away_logo');
            $table->string('city');
            $table->string('state');
            $table->string('status');
            $table->string('feed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};
