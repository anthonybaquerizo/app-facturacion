<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("ubigeo_id", 30);
            $table->foreign("ubigeo_id")
                ->references("id")
                ->on("ubigeos")
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->string("ruc", 11);
            $table->text("razon_social");
            $table->text("nombre_comercial")->nullable();
            $table->text("direccion");
            $table->boolean("estado");
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
        Schema::dropIfExists('empresas');
    }
}
