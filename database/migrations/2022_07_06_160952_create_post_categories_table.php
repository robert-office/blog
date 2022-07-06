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
        Schema::create('post_categories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_post');
            $table->unsignedBigInteger('id_category');

            $table->timestamps();
        });

        Schema::table('post_categories', function (Blueprint $table) {
            $table->foreign('id_post')->references('id')->on('posts')->cascadeOnDelete();
            $table->foreign('id_category')->references('id')->on('categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_categories');
    }
};
