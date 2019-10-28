<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CoupenRegion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('coupens',function(Blueprint $table){
        Schema::create('coupen_region', function (Blueprint $table){
            $table->unsignedBigInteger('coupen_id');
            $table->foreign('coupen_id')->references('id')->on('coupens')->onDelete('cascade');
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupen_region');
    }
}
