<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_vehical', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_id');
            $table->string('user_id');
            $table->string('rent_date');
            $table->string('total');
            $table->string('duration');
            $table->string('approved')->default('0');
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
        Schema::dropIfExists('rental__details');
    }
}
