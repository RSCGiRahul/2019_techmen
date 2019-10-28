<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDiagnoseDeleteOn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        $tableArray = array('diagnoses','product_diagnose', 'diagnose_level');
//        foreach ($tableArray as $tablename){
//
//            Schema::table($tablename, function (Blueprint $table) {
//                $table->softDeletes();
//            });
//        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        $table->softDeletes();
//        Schema::dropsoftDeleted('diagnoses');
    }
}
