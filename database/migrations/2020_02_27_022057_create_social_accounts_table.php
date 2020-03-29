<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialAccountsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('social_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('handle')->nullable();
            $table->string('account_id')->nullable();
            $table->string('api_key')->nullable();
            $table->string('api_secret')->nullable();
            $table->unsignedBigInteger('social_account_type_id')->nullable();
            $table->timestamps();
        });

        Schema::table('social_accounts', function (Blueprint $table) {
            $table->foreign('social_account_type_id')->references('id')->on('social_account_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('social_accounts');
    }
}
