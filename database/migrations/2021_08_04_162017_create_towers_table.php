<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('towers', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->string('towers_type');
            $table->double('towers_height');
            $table->string('towers_brand');
            $table->string('towers_soil_type');
            $table->string('towers_foundation_type');
            $table->double('towers_design_load_capacity');
            $table->string('towers_sharing_operator');
            $table->double('tower_used_load_capacity');
            $table->double('ethio_antenna_weight');
            $table->double('ethio_antenna_height');
            $table->double('operator_antenna_height');
            $table->double('operator_tower_load');
            $table->double('operator_antenna_weight');
            $table->date('tower_installation_date');
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
        Schema::dropIfExists('towers');
    }
}
