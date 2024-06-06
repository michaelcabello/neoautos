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
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('shortdescription')->nullable();
            $table->text('longdescription')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('state')->default(false);
            $table->string('image', 2048)->default('subcategories/default.jpg')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();

            $table->unsignedBigInteger('item_id')->nullable();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');


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
        Schema::dropIfExists('subcategories');
    }
};
