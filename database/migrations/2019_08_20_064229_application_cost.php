<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// app/database/migrations/ApplicationCost
class ApplicationCost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_cost', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('application_id');
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');


            $table->unsignedBigInteger('inventory_id');
            $table->foreign('inventory_id')->references('id')->on('inventories')->onDelete('cascade');
            
            $table->unsignedInteger('quantity')->nullable();


            $table->unsignedBigInteger('add_by');
            $table->foreign('add_by')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('approved_by');
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('repaired_by');
            $table->foreign('repaired_by')->references('id')->on('users')->onDelete('cascade');
            
            $table->date('repair_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_cost');
    }
}
