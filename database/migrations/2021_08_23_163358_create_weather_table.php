<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("weather", function (Blueprint $table): void {
            $table->id();
            $table->string("main");
            $table->string("description");
            $table->float("temperature");
            $table->integer("pressure");
            $table->integer("humidity");
            $table->integer("visibility");
            $table->float("wind_speed");
            $table->unsignedBigInteger("city_id");
            $table->foreign("city_id")->references("id")->on("cities")
                ->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("weather");
    }
}
