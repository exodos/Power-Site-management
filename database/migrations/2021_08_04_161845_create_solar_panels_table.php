<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolarPanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solar_panels', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->integer('number_solar_system');
            $table->string('solar_panel_type');
            $table->double('solar_panels_module_capacity');
            $table->integer('number_of_arrays');
            $table->string('solar_controller_type');
            $table->double('regulator_capacity');
            $table->integer('solar_regulator_Qty');
            $table->integer('number_of_structure_group');
            $table->double('solar_structure_front_height');
            $table->double('solar_structure_rear_height');
            $table->date('commission_date');
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
        Schema::dropIfExists('solar_panels');
    }
}
