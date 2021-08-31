<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otns', function (Blueprint $table) {
            $table->id();
            $table->double('power_consumption');
            $table->string('breaker_type');
            $table->bigInteger('breaker_quantity');
            $table->double('llvd_capacity');
            $table->double('blvd_capacity');
            $table->foreign('llvd_capacity')->references('llvd_capacity')->on('rectifiers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('blvd_capacity')->references('blvd_capacity')->on('rectifiers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('site_id')->constrained('sites')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('otns');
    }
}
