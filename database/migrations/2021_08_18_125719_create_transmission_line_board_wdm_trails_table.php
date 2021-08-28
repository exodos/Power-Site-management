<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransmissionLineBoardWdmTrailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transmission_line_board_wdm_trails', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('trail_name');
            $table->string('working_mode');
            $table->string('source_ne');
            $table->bigInteger('source_port_number');
            $table->double('source_port_wave_length');
            $table->string('sink_ne');
            $table->bigInteger('sink_board_id');
            $table->bigInteger('sink_port_number');
            $table->double('sink_port_wave_length');
            $table->foreignId('transmission_line_boards_id')->constrained('transmission_line_boards')->index('line_id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('transmission_line_board_wdm_trails');
    }
}
