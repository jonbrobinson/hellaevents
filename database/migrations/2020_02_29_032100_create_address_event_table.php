<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressEventTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('address_event', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('event_id');
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
        });

        Schema::table('address_event', function (Blueprint $table) {
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('address_event');
    }
}
