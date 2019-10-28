<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Brand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('gadget_id');
            $table->foreign('gadget_id')->references('id')->on('gadgets')->onDelete('cascade');
            $table->string('name');
            $table->softDeletes();
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
        Schema::dropIfExists('brands');
    }
}
