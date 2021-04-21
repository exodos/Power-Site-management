<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirConditionersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('air_conditioners', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->string('air_conditioners_model');
            $table->double('air_conditioners_capacity');
            $table->foreignId('site_id')->constrained('sites')->onUpdate('cascade');
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
        Schema::dropIfExists('air_conditioners');
    }
}
