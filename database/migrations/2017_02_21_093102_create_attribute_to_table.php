<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('”attribute_to_table”', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('PolicyID');
            $table->integer('ReportID');
            $table->string('value');
            $table->string('type');
            $table->integer('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('”attribute_to_table”');
    }
}
