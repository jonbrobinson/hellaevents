<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('address_organization', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('organization_id');
            $table->tinyInteger('active')->default(0);
            $table->tinyInteger('primary')->default(0);
            $table->timestamps();
        });

        Schema::table('address_organization', function (Blueprint $table) {
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('organization_id')->references('id')->on('organizations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('address_organization');
    }
}
