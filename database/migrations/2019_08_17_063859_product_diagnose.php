<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductDiagnose extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('product_diagnose', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('diagnose_id');
            $table->foreign('diagnose_id')->references('id')->on('diagnoses')->onDelete('cascade');
            $table->bigInteger('diagnose_level_id')->default(0);
            $table->double('market_price', 8, 2); 
            $table->double('price', 8, 2); 
            $table->text('description')->nullable(); 
            $table->tinyInteger('repair_type')->nullable();
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
        Schema::dropIfExists('product_diagnose');
    }
}
