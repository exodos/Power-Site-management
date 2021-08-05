<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ups', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->string('ups_type');
            $table->string('ups_model');
            $table->double('ups_capacity');
            $table->string('input_pob_type');
            $table->double('input_pob_capacity');
            $table->integer('number_of_ups_model');
            $table->string('battery_type');
            $table->integer('numbers_of_battery_banks');
            $table->double('battery_capacity');
            $table->time('battery_holding_time');
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
        Schema::dropIfExists('ups');
    }
}
