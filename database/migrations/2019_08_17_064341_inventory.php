<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Inventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');       
            $table->unsignedBigInteger('quantity');
            $table->text('per_unit_price')->nullable();
            $table->text('total_price')->nullable();
            $table->softDeletes();
            $table->unsignedBigInteger('add_by');
            $table->foreign('add_by')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('approved_by');
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('inventories');
    }
}
