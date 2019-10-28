<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Address extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
    
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');

           

            $table->string('address')->nullable();

            $table->string('location')->nullable();
            // $table->unsignedBigInteger('customer_id');
            // $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->integer('phone')->nullable();
            $table->softDeletes();

            $table->text('remark')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
