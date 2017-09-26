<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("vehicle_id");
            $table->integer("origin_id");
            $table->integer("destination_id");
            $table->datetime("departure");
            $table->datetime("arrival");
            $table->text("pickup_address")->nullable();
            $table->integer("firstclass_apply")->nullable();
            $table->integer("business_apply")->nullable();
            $table->integer("children_apply")->nullable();
            $table->integer("economic_apply");
            $table->integer("organization_id");
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
        Schema::dropIfExists('schedules');
    }
}
