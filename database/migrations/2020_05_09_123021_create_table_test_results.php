<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTestResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_test_id')->unsigned();
            $table->integer('question_id');
            $table->integer('answer_id');
            $table->timestamps();

            $table->foreign('user_test_id')
                ->references('id')->on('user_tests')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_results');
    }
}
