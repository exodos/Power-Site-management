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
            $table->double('rectifiers_capacity');
            $table->string('rectifiers_module_model');
            $table->integer('number_of_rectifiers_model_slots');
            $table->double('rectifiers_module_capacity');
            $table->integer('rectifier_module_Qty');
            $table->double('llvd_capacity');
            $table->double('blvd_capacity');
            $table->integer('battery_fuess_Qty');
            $table->string('power_of_msag_msan_connected_company');
            $table->string('monitoring_system_name');
            $table->integer('lld_number');
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
        Schema::dropIfExists('rectifiers');
    }
}
