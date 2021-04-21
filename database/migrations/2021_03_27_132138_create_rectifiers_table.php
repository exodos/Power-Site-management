<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRectifiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rectifiers', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->string('rectifiers_model');
            $table->integer('number_of_rectifiers');
            $table->double('rectifiers_capacity');
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
        Schema::dropIfExists('rectifiers');
    }
}
