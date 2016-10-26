<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllergicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('allergics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('avoid', 255);
            $table->string('take_care', 255);
            $table->timestamps();
            $table->create();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('allergics', function (Blueprint $table) {
           $table->dropIfExists();
        });
    }
}
