<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Application extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');


            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            
                // $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');


            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->unsignedBigInteger('diagnose_id');
            $table->foreign('diagnose_id')->references('id')->on('diagnoses')->onDelete('cascade');

            $table->text('remark')->nullable();
           

            $table->double('price', 8, 2)->nullable(); 
           
            $table->dateTime('request_date_time')->nullable();
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
       Schema::dropIfExists('addresses');
       Schema::dropIfExists('customers');
       Schema::dropIfExists('products');
       Schema::dropIfExists('diagnoses');
       Schema::dropIfExists('applications');
    }
}
