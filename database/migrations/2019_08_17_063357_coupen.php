<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Coupen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupens',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->text('name');
            $table->tinyInteger('all_region')->default(0)->comment('1=>all,0=>not for all');
            $table->tinyInteger('all_product')->default(0);
            $table->string('code');
            $table->tinyInteger('type')->default(1);
            $table->float('discount')->nullable();
//            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('coupens');
    }
}
