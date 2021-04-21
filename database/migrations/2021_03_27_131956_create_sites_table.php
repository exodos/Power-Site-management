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
            $table->decimal('sites_latitude');
            $table->decimal('sites_longitude');
            $table->string('sites_region_zone');
            $table->string('sites_political_region');
            $table->string('sites_category');
            $table->string('sites_class');
            $table->string('sites_value');
            $table->string('sites_type');
            $table->string('sites_configuration');
            $table->string('monitoring_system_name');
            $table->integer('commercial_power_line_voltage');
            $table->double('distance_maintenance_center');
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
