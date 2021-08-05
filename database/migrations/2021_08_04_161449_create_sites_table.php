<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('sites_name');
            $table->string('ps_configuration');
            $table->string('monitoring_status');
            $table->decimal('sites_latitude');
            $table->decimal('sites_longitude');
            $table->string('sites_region_zone');
            $table->string('sites_political_region');
            $table->string('sites_location');
            $table->string('sites_class');
            $table->string('sites_value');
            $table->string('sites_type');
            $table->string('maintenance_center');
            $table->double('distance_mc');
            $table->string('list_of_ne');
            $table->integer('number_of_towers');
            $table->integer('number_of_generator');
            $table->integer('number_of_airconditioners');
            $table->integer('number_of_rectifiers');
            $table->integer('number_of_solar_system');
            $table->integer('number_of_down_links');
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
        Schema::dropIfExists('sites');
    }
}
