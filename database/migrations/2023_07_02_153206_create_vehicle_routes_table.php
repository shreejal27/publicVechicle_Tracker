<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleRoutesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicle_routes', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_name');
            $table->text('vehicle_routes');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicle_routes');
    }
};
