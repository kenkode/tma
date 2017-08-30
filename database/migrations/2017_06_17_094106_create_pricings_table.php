<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("roomtype_id");
            $table->integer("branch_id");
            $table->date("start_date")->nullable();
            $table->date("end_date")->nullable();
            $table->float("mon",15,2)->default('0.00')->nullable();
            $table->float("tue",15,2)->default('0.00')->nullable();
            $table->float("wen",15,2)->default('0.00')->nullable();
            $table->float("thur",15,2)->default('0.00')->nullable();
            $table->float("fri",15,2)->default('0.00')->nullable();
            $table->float("sat",15,2)->default('0.00')->nullable();
            $table->float("sun",15,2)->default('0.00')->nullable();
            $table->float("default_amount",15,2)->default('0.00')->nullable();
            $table->integer("default_plan")->nullable();
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
        Schema::dropIfExists('pricings');
    }
}
