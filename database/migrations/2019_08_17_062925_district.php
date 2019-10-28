<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class District extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
       Schema::create('districts', function(Blueprint $table){
         $table->bigIncrements('id');
         $table->unsignedBigInteger('state_id');
         $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
         $table->string('name');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('districts');
    }
}
