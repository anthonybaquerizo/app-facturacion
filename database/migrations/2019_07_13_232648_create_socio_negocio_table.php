<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocioNegocioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socios_negocio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger("tipo_documento_id");
            $table->foreign("tipo_documento_id")
                ->references("id")
                ->on("tipos_documento")
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->boolean("cliente");
            $table->boolean("proveedor");
            $table->boolean("colaborador");
            $table->string("codigo_interno", 100);
            $table->string("ruc", 11)->nullable();
            $table->string("nro_documento", 20)->nullable();
            $table->text("razon_social");
            $table->string("nombres", 100)->nullable();
            $table->string("ape_paterno", 50)->nullable();
            $table->string("ape_materno", 50)->nullable();
            $table->string("pagina_web", 250)->nullable();
            $table->boolean("estado")->default(1);
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
        Schema::dropIfExists('socios_negocio');
    }
}
