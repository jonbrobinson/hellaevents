<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('address_line_one', 100);
            $table->char('address_line_two', 100)->nullable();
            $table->char('city', 75);
            $table->char('state', 2)->nullable();
            $table->integer('zipcode')->nullable();
            $table->unsignedBigInteger('table_type_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('capacity_min')->nullable();
            $table->integer('capacity_max')->nullable();
            $table->unsignedBigInteger('facilty_type_id')->nullable();
            $table->timestamps();
        });

        Schema::table('addresses', function (Blueprint $table) {
            $table->foreign('table_type_id')->references('id')->on('table_types');
            $table->foreign('facilty_type_id')->references('id')->on('facility_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
