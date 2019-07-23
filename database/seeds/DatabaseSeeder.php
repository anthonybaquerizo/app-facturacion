<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->clearTables();
        $this->call(UbigeoSeeder::class);
        $this->call(TipoDocumentoSeeder::class);
        $this->call(TipoContactoSeed::class);
        $this->call(OperacionSeeder::class);

        // Se crea la empresa principal
        $this->call(EmpresaPrincipalSeed::class);
    }

    /**
     * Limpia los registros para insetar el predefinido
     */
    private function clearTables()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // Se eliminan los socios de negocios
        DB::table("socio_negocio_sucursales")->truncate();
        DB::table("socios_negocio")->truncate();
        DB::table("sucursales")->truncate();
        DB::table("empresas")->truncate();
        DB::table("ubigeos")->truncate();
        DB::table("tipos_documento")->truncate();
        DB::table("rol_operaciones")->truncate();
        DB::table("operaciones")->truncate();
        DB::table("usuario_sucursales")->truncate();
        DB::table("usuarios")->truncate();
        // Agregando mensaje de prueba
        DB::table("tipos_contacto")->truncate();
    }

}
