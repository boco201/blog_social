<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('email')->unque();
            $table->string('kichen');
            $table->string('titre');
            $table->string('niveau');
            $table->boolean('premiums')->default(0);
            $table->text('description')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('body')->nullable();
            $table->string('image')->nullable();
            $table->string('photo')->nullable();
            $table->string('media')->nullable();
            $table->string('upload')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('articles');
    }
}
