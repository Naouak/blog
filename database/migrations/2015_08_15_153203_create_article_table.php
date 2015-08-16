<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id',false,true);
            $table->text('title');
            $table->string('url');
            $table->text('excerpt')->nullable()->default(null);
            $table->longText('content');
            $table->dateTime('published_at');
            $table->boolean('published')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("user_id")
                ->references('id')
                ->on('users')
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
        Schema::drop('articles');
    }
}
