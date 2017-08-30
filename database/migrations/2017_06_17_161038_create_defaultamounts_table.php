<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultamountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defaultamounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("roomtype_id");
            $table->integer("branch_id");
            $table->float("amount",15,2)->default('0.00');
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
        Schema::dropIfExists('defaultamounts');
    }
}
