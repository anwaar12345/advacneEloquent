<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content')->nullable();
            $table->integer('rating')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('commentable_type')->nullable();
            $table->bigInteger('commentable_id')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        DB::statement('ALTER TABLE comments ADD FULLTEXT full_text (content)');
        Schema::connection('sqlite')->dropIfExists('comments');
        Schema::connection('sqlite')->create('comments', function (Blueprint $table) {
            
            $table->text('content')->nullable();
            $table->unsignedBigInteger('user_id');

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
