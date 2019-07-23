<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolOperacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_operaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("rol_id");
            $table->foreign("rol_id")
                ->references("id")
                ->on("roles")
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table->unsignedInteger("operacion_id");
            $table->foreign("operacion_id")
                ->references("id")
                ->on("operaciones")
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
        Schema::dropIfExists('rol_operaciones');
    }
}
