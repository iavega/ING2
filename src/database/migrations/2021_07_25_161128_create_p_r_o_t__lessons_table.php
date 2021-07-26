<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePROTLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_r_o_t__lessons', function (Blueprint $table) {
            $table->id('ID_Lesson');
            $table->string('Title');
            $table->string('Description');
            $table->string('Picture');
            $table->string('Picture');
            $table->string('Picture');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_r_o_t__lessons');
    }
}
