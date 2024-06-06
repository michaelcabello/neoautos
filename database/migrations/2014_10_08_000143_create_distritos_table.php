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
         Schema::create('distritos', function (Blueprint $table) {
            $table->string('id');
            $table->primary('id');
            //$table->string('iddi')->nullable();
            $table->string('name')->nullable();
            $table->string('provincia_id');
            $table->string('departamento_id');

            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
            $table->foreign('provincia_id')->references('id')->on('provincias')->onDelete('cascade');

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
        Schema::dropIfExists('distritos');
    }
};
