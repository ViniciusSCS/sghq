<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->nullable();
            $table->string('name');
            $table->string('publication_date');
            $table->foreignUuid('type_comic_id')->references('uuid')->on('types_comics');
            $table->foreignUuid('user_id')->references('uuid')->on('users');
            $table->timestamps();
            $table->string('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics');
    }
}
