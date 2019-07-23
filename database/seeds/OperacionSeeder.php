<?php

use Illuminate\Database\Seeder;

class OperacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Se insertan
        $now = \Carbon\Carbon::now();
        DB::table("operaciones")->insert([
            ["concepto" => "Configuración", "ope_ver" => 1, "ope_crear" => 1, "ope_editar" => 1, "ope_eliminar" => 1, "estado" => 1, "created_at" => $now],
            ["concepto" => "Clientes", "ope_ver" => 1, "ope_crear" => 1, "ope_editar" => 1, "ope_eliminar" => 1, "estado" => 1, "created_at" => $now],
            ["concepto" => "Proveedores", "ope_ver" => 1, "ope_crear" => 1, "ope_editar" => 1, "ope_eliminar" => 1, "estado" => 1, "created_at" => $now],
            ["concepto" => "Colaboradores", "ope_ver" => 1, "ope_crear" => 1, "ope_editar" => 1, "ope_eliminar" => 1, "estado" => 1, "created_at" => $now],
            ["concepto" => "Sucursales", "ope_ver" => 1, "ope_crear" => 1, "ope_editar" => 1, "ope_eliminar" => 1, "estado" => 1, "created_at" => $now],
            ["concepto" => "Roles", "ope_ver" => 1, "ope_crear" => 1, "ope_editar" => 1, "ope_eliminar" => 1, "estado" => 1, "created_at" => $now],
            ["concepto" => "Usuario", "ope_ver" => 1, "ope_crear" => 1, "ope_editar" => 1, "ope_eliminar" => 1, "estado" => 1, "created_at" => $now],
        ]);
    }
}
