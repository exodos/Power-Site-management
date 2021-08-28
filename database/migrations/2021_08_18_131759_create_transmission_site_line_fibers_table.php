<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransmissionSiteLineFibersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transmission_site_line_fibers', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('direction_name');
            $table->string('cabling_method');
            $table->string('fiber_type');
            $table->bigInteger('core_number');
            $table->bigInteger('next_hope_ne_id');
            $table->bigInteger('next_hope_distance');
            $table->foreignId('transmission_otn_nes_id')->constrained('transmission_otn_nes')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('transmission_site_line_fibers');
    }
}
