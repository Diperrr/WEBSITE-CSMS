<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuesionerResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuesioner_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // User who answered the questionnaire
            $table->unsignedBigInteger('kuesioner_id'); // References the question from the kuesioners table
            $table->string('jawaban'); // The user's response to the question
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kuesioner_id')->references('id')->on('kuesioners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kuesioner_responses');
    }
}
