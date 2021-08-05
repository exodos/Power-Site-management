<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('powers', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->string('generator_type');
            $table->integer('generator_capacity');
            $table->string('engine_model');
            $table->double('fuel_tanker_capacity');
            $table->string('alternator_model');
            $table->double('alternator_capacity');
            $table->string('controller_mode_model');
            $table->string('ats_model');
            $table->double('ats_capacity');
            $table->double('generator_foundation_size');
            $table->double('fuel_tank_foundation_size');
            $table->string('fuel_tanker_type');
            $table->integer('fuel_tank_Qty');
            $table->double('starter_battery_capacity');
            $table->string('starter_battery_type');
            $table->string('functionality_status');
            $table->date('dg_commission_date');
            $table->integer('dg_lld_number');
            $table->string('grid_power_line_voltage_and_transformer_capacity');
            $table->date('transformer_installation_date');
            $table->foreignId('site_id')->constrained('sites')->onUpdate('cascade');
            $table->foreignId('work_order_id')->constrained('work_orders');
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
        Schema::dropIfExists('powers');
    }
}
