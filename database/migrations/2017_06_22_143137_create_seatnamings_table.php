<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatnamingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seatnamings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_id');
            $table->string('seatno');
            $table->integer('vip');
            $table->integer('business');
            $table->integer('economy');
            $table->integer('apply_to_all');
            $table->integer('organization_id');
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
        Schema::dropIfExists('seatnamings');
    }
}
