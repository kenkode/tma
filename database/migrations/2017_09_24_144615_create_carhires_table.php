<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarhiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carhires', function (Blueprint $table) {
            $table->increments('id');
            $table->string("image")->nullable();
            $table->string("type");
            $table->integer("capacity");
            $table->float("price",15,2);
            $table->string("location")->nullable();
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
        Schema::dropIfExists('carhires');
    }
}
