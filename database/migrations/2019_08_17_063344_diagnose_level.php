<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiagnoseLevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnose_level',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('diagnose_id');
            $table->foreign('diagnose_id')->references('id')->on('diagnoses')->onDelete('cascade');
            $table->unsignedInteger('parent_id')->default(0);
            $table->string('name');
            $table->softDeletes();
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnose_level');
    }
}
