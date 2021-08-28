<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransmissionOtnNesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transmission_otn_nes', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('ne_name');
            $table->string('ne_type');
            $table->string('ne_vendor');
            $table->foreignId('transmission_site_id')->constrained('transmission_sites')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('transmission_otn_nes');
    }
}
