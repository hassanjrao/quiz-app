<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_choices', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("question_id");
            $table->foreign("question_id")->references("id")->on("questions");

            $table->string("choice");

            $table->boolean("is_correct")->default(false)->comment("1: correct, 0: incorrect");

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
        Schema::dropIfExists('question_choices');
    }
};
