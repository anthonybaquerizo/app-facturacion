<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioSucursalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_sucursales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("usuario_id");
            $table->foreign("usuario_id")
                ->references("id")
                ->on("usuarios")
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table->unsignedBigInteger("sucursal_id");
            $table->foreign("sucursal_id")
                ->references("id")
                ->on("sucursales")
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->unsignedBigInteger("rol_id");
            $table->foreign("rol_id")
                ->references("id")
                ->on("roles")
                ->onUpdate("cascade")
                ->onDelete("restrict");
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
        Schema::dropIfExists('usuario_sucursales');
    }
}
