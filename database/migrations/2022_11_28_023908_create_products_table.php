<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;

return new class extends Migration
{


    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug');

            $table->enum('tipo', [Product::PRODUCTO, Product::SERVICIO])->default(Product::PRODUCTO);
            $table->enum('typecurrency', [Product::SOLES, Product::DOLARES, Product::EUROS])->default(Product::SOLES);
            $table->double('price')->nullable();
            $table->double('priceoffer')->nullable();
            $table->enum('newused', [Product::NUEVO, Product::USADO])->default(Product::NUEVO);


            //$table->enum('transmision', [Product::AUTOMATICA, Product::MECANICA])->default(Product::MECANICA);
            $table->string('transmision')->nullable();

            $table->string('combustible')->nullable();//otra tabla
            $table->string('motor')->nullable();//
            $table->string('kilometraje')->nullable();
            $table->string('numpuertas')->nullable();
            $table->string('traccion')->nullable();//otra tabla

            //$table->string('traccion_id')->nullable();
            //$table->foreign('traccion_id')->references('id')->on('traccions');

            $table->unsignedBigInteger('color_id')->nullable();
            $table->foreign('color_id')->references('id')->on('colors');

            //$table->string('color')->nullable();//otra tabla
            $table->string('cilindrada')->nullable();//otra tabla o lista desplegable
            $table->string('codigoreferencia')->nullable(); //Código de referencia
            $table->string('placa')->nullable();
            $table->string('video')->nullable();



            $table->string('departamento_id')->nullable();
            $table->foreign('departamento_id')->references('id')->on('departamentos');

            $table->string('provincia_id')->nullable();
            $table->foreign('provincia_id')->references('id')->on('provincias');

            $table->string('distrito_id')->nullable();
            $table->foreign('distrito_id')->references('id')->on('distritos');





            //equipamiento
            $table->boolean('retrovisoreselectricos')->nullable();
            $table->boolean('neblineros')->nullable();
            $table->boolean('aireacondicionado')->nullable();
            $table->boolean('fullequipo')->nullable();
            $table->boolean('computadoradeabordo')->nullable();
            $table->boolean('parlantesbajos')->nullable();
            $table->boolean('radiocd')->nullable();
            $table->boolean('radiomp3')->nullable();
            //exterior
            $table->boolean('aros')->nullable();
            $table->boolean('arosdealeacion')->nullable();
            $table->boolean('parrilla')->nullable();
            $table->boolean('luceshalogenas')->nullable();
            //seguridad
            $table->boolean('localizadorgps')->nullable();
            $table->boolean('airbag')->nullable();
            $table->boolean('laminasdeseguridad')->nullable();
            $table->boolean('blindado')->nullable();
            $table->boolean('farosantiniebladelantero')->nullable();
            $table->boolean('farosantinieblatraseros')->nullable();
            $table->boolean('inmovilizadordemotor')->nullable();
            $table->boolean('repartidorelectronicodefrenado')->nullable();
            $table->boolean('frenosabs')->nullable();
            $table->boolean('alarma')->nullable();
            //extras
            $table->boolean('sunroof')->nullable();
            $table->boolean('asientosdecuero')->nullable();
            $table->boolean('climatizador')->nullable();


            $table->text('datasheet')->nullable();//ficha tecnica
            $table->double('stock')->nullable();
            $table->integer('views')->nullable();
            $table->integer('stars')->nullable();
            $table->text('shortdescription')->nullable();
            $table->text('longdescription')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('state')->default(false);

            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();

            $table->date('registrationdate')->nullable();//falta
            $table->date('enddate')->nullable();//falta

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('item_id')->nullable();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');

            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');

            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

            $table->unsignedBigInteger('tipo_id')->nullable();
            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('cascade');

            $table->unsignedBigInteger('subtitulo_id')->nullable();//falta pero se pondra por admin
            $table->foreign('subtitulo_id')->references('id')->on('subtitulos')->onDelete('cascade');

            $table->unsignedBigInteger('year_id')->nullable();
            $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade');

            $table->string('yearmodelo')->nullable();//
            $table->string('version')->nullable();//

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
        Schema::dropIfExists('products');
    }
};
