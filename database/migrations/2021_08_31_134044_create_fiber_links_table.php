<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiberLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiber_links', function (Blueprint $table) {
            $table->id('link_id');
            $table->string('link_name');
            $table->string('fiber_type');
            $table->string('used_core');
            $table->bigInteger('free_core');
            $table->double('number_splice_points');
            $table->double('average_link_loss');
            $table->string('ofc_type');
            $table->string('a_end_odf_connector_type');
            $table->string('z_end_odf_connector_type');
            $table->foreignId('site_id')->constrained('sites')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('fiber_links');
    }
}
