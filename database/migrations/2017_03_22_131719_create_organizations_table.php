<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('phone');
            $table->string('currency_name')->nullable();
            $table->string('currency_shortname')->nullable();
            $table->integer('is_nairobi')->nullable();
            $table->integer('is_central')->nullable();
            $table->integer('is_coast')->nullable();
            $table->integer('is_western')->nullable();
            $table->integer('is_nyanza')->nullable();
            $table->integer('is_rift')->nullable();
            $table->integer('is_eastern')->nullable();
            $table->integer('is_northeastern')->nullable();
            $table->string('mail_driver')->nullable();
            $table->string('mail_host')->nullable();
            $table->integer('mail_port')->nullable();
            $table->string('mail_username')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('mail_encryption')->nullable();
            $table->string("google_map_cordinates")->nullable();
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
        Schema::dropIfExists('organizations');
    }
}
