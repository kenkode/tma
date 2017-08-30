<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->increments('id');
            $table->float("jan",15,2)->default('0.00')->nullable();
            $table->float("feb",15,2)->default('0.00')->nullable();
            $table->float("mar",15,2)->default('0.00')->nullable();
            $table->float("apr",15,2)->default('0.00')->nullable();
            $table->float("may",15,2)->default('0.00')->nullable();
            $table->float("jun",15,2)->default('0.00')->nullable();
            $table->float("jul",15,2)->default('0.00')->nullable();
            $table->float("aug",15,2)->default('0.00')->nullable();
            $table->float("sep",15,2)->default('0.00')->nullable();
            $table->float("oct",15,2)->default('0.00')->nullable();
            $table->float("nov",15,2)->default('0.00')->nullable();
            $table->float("dec",15,2)->default('0.00')->nullable();
            $table->integer("is_enabled");
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
        Schema::dropIfExists('deposits');
    }
}
