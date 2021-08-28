<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransmissionOtnServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transmission_otn_services', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('service_name');
            $table->string('customer_name');
            $table->string('sla_type');
            $table->string('rate');
            $table->string('source_ne');
            $table->bigInteger('source_port_number');
            $table->string('sink_ne');
            $table->bigInteger('sink_board_id');
            $table->bigInteger('sink_port_number');
            $table->foreignId('transmission_client_boards_id')->constrained('transmission_client_boards')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('transmission_otn_services');
    }
}
