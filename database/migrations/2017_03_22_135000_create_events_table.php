<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("image")->nullable();
            $table->text("description")->nullable();
            $table->text("address")->nullable();
            $table->text("contact")->nullable();
            $table->string("google_map_cordinates")->nullable();
            $table->float("vip",15,2)->nullable();
            $table->float("normal",15,2)->nullable();
            $table->float("children",15,2)->nullable();
            $table->float("discount",15,2)->nullable();
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
        Schema::dropIfExists('events');
    }
}
