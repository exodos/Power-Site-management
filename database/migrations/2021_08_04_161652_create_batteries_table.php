<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batteries', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->string('batteries_type');
            $table->string('batteries_model');
            $table->double('batteries_voltage');
            $table->double('batteries_capacity');
            $table->integer('number_of_batteries_banks');
            $table->double('battery_holding_time');
            $table->date('commission_date');
            $table->integer('lld_number');
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
        Schema::dropIfExists('batteries');
    }
}
