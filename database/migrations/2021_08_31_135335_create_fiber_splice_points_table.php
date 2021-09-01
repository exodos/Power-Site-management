<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiberSplicePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiber_splice_points', function (Blueprint $table) {
            $table->id();
            $table->double('latitude', 10, 8);
            $table->double('longitude', 11, 8);
            $table->foreignId('fiber_links_id')->constrained('fiber_links')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('fiber_splice_points');
    }
}
