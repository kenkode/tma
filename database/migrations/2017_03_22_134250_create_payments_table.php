<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->increments('origin_id')->nullable();
            $table->increments('destination_id')->nullable();
            $table->float("firstclass",15,2)->nullable();
            $table->float("business",15,2)->nullable();
            $table->float("economic",15,2)->nullable();
            $table->float("children",15,2)->nullable();
            $table->float("discount",15,2)->nullable();
            $table->integer("vehicle_id");
            $table->integer("organization_id");
            $table->string("type");
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
        Schema::dropIfExists('payments');
    }
}
