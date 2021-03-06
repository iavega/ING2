<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePROTQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_r_o_t__questions', function (Blueprint $table) {
            $table->id('ID_Question');
            $table->dateTime('CreationDate');
            $table->decimal('PointAsig');
            $table->string('Question');
            $table->integer('ID_correctAnswer');
            $table->integer('Level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_r_o_t__questions');
    }
}
