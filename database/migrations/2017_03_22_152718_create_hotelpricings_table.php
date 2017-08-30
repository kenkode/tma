<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelpricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotelpricings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("room_id");
            $table->float("monday_adult",15,2)->default(0.00);
            $table->float("monday_child",15,2)->default(0.00);
            $table->float("tuesday_adult",15,2)->default(0.00);
            $table->float("tuesday_child",15,2)->default(0.00);
            $table->float("wednesday_adult",15,2)->default(0.00);
            $table->float("wednesday_child",15,2)->default(0.00);
            $table->float("thursday_adult",15,2)->default(0.00);
            $table->float("thursday_child",15,2)->default(0.00);
            $table->float("friday_adult",15,2)->default(0.00);
            $table->float("friday_child",15,2)->default(0.00);
            $table->float("saturday_adult",15,2)->default(0.00);
            $table->float("saturday_child",15,2)->default(0.00);
            $table->float("sunday_adult",15,2)->default(0.00);
            $table->float("sunday_child",15,2)->default(0.00);
            $table->float("discount",15,2)->default(0.00)->nullable();
            $table->integer("is_discount_active");
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
        Schema::dropIfExists('hotelpricings');
    }
}
