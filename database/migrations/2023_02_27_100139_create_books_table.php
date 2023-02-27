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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('isbn-13', 13);
            $table->string('title', 80);
            $table->string('series', 50);
            $table->string('author', 100);
            $table->string('publisher', 80);
            $table->date('pubblication_date');
            $table->text('plot');
            $table->string('genre', 40);
            $table->text('cover_image');
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
        Schema::dropIfExists('books');
    }
};
