<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('des');
            $table->text('office_address');
            $table->string('email');
            $table->string('phone')->unique();
            $table->string('operator_name');
            $table->string('operator_phone');
            $table->string('tin');
            $table->string('trade_num');
            $table->integer('status')->default(1)->comment("1 for active 2 for inactive");
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
        Schema::dropIfExists('vendors');
    }
};
