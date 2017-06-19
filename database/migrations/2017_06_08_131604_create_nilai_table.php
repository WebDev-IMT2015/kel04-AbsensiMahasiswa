<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function(Blueprint $table){
            $table->increments('id');
            $table->string('nim');
            $table->string('mk');
            $table->string('hari');
            $table->integer('saa1');
            $table->integer('saa2');
            $table->integer('saa3');
            $table->integer('uts');
            $table->integer('uas');
            $table->integer('nilaiakhir')->nullable();

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
        //
    }
}
