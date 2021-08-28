<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransmissionRoadmBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transmission_roadm_boards', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('board_name');
            $table->bigInteger('slot_number');
            $table->string('type');
            $table->bigInteger('number_free_ports');
            $table->bigInteger('number_used_ports');
            $table->string('direction');
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
        Schema::dropIfExists('transmission_roadm_boards');
    }
}
