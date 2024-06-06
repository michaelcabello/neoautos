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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('external_id')->nullable();
            $table->string('external_provider')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();

            $table->string('razonsocial')->unique();
            $table->string('slug');
            $table->string('ruc')->nullable();
            $table->string('tradename')->nullable();
            $table->text('logo')->nullable();
            $table->integer('vistas')->nullable();
            $table->integer('estrellas')->nullable();
            $table->integer('order')->nullable();
            $table->text('aboutus')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->integer('yearsofexperience')->nullable();
            $table->integer('customersserved')->nullable();
            $table->integer('fulfilledprojects')->nullable();
            $table->integer('manufacturedproducts')->nullable();
            $table->text('slogan')->nullable();

            $table->text('facebook')->nullable();
            $table->text('instagram')->nullable();
            $table->text('youtube')->nullable();
            $table->text('twitter')->nullable();
            $table->text('tiktok')->nullable();
            $table->text('pinteresk')->nullable();
            $table->text('redsocial1')->nullable();
            $table->text('redsocial2')->nullable();
            $table->text('redsocial3')->nullable();
            $table->text('web')->nullable();
            $table->text('registrationdate')->nullable();
            $table->text('updatingdate')->nullable();

            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('movil')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email2')->nullable();
            $table->text('coordenadas')->nullable();

            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();

            $table->boolean('state')->default(false);

            $table->string('departamento_id')->nullable();
            $table->foreign('departamento_id')->references('id')->on('departamentos');

            $table->string('provincia_id')->nullable();
            $table->foreign('provincia_id')->references('id')->on('provincias');

            $table->string('distrito_id')->nullable();
            $table->foreign('distrito_id')->references('id')->on('distritos');




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
        Schema::dropIfExists('users');
    }
};
