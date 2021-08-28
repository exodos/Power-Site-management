<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransmissionLineBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transmission_line_boards', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('board_name');
            $table->bigInteger('slot_number');
            $table->double('port_capacity');
            $table->bigInteger('number_free_ports');
            $table->bigInteger('number_used_ports');
            $table->bigInteger('number_ports_modules');
            $table->foreignId('transmission_equipment_id')->constrained('transmission_equipment')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('transmission_line_boards');
    }
}
