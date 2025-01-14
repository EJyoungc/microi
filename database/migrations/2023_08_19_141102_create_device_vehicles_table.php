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
        Schema::create('device_vehicles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('organisation_id')->nullable();
            $table->integer('device_id')->nullable();
            $table->string('vehicle_make');
            $table->string('vehicle_model');
            $table->integer('make_year');
            $table->string('vin');
            $table->integer('mileage');
            $table->string('fuel_type');
            $table->boolean('on_sale')->default(false);
            $table->string('add_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_vehicles');
    }
};
