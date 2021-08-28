<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransmissionEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transmission_equipment', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('subrack_name');
            $table->string('subrack_type');
            $table->string('equipment_type');
            $table->bigInteger('number_used_slots');
            $table->bigInteger('number_free_slots');
            $table->string('vendor');
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
        Schema::dropIfExists('transmission_equipment');
    }
}
