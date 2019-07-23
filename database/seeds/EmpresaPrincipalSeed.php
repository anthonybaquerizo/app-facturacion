<?php

use App\Model\Empresa;
use App\Model\Operacion;
use App\Model\Rol;
use App\Model\RolOperacion;
use App\Model\SocioNegocio;
use App\Model\SocioNegocioSucursal;
use App\Model\Sucursal;
use App\Model\TipoDocumento;
use App\Model\Ubigeo;
use App\Model\Usuario;
use App\Model\UsuarioSucursal;

use Illuminate\Database\Seeder;

class EmpresaPrincipalSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Illuminate\Support\Carbon::now();

        // Se busca el ubigeo predeterminado
        $objUbigeo = (new Ubigeo())->find("9589150101");
        $objDocumentType = (new TipoDocumento())->find(5);

        // Se crea la empresa principal
        $objBusiness = new Empresa();
        $objBusiness->fill([
            "ruc" => "20000000001",
            "razon_social" => "Empresa DEMO",
            "nombre_comercial" => "",
            "direccion" => "Sin dirección",
            "estado" => 1,
            "created_at" => $now,
        ]);
        $objBusiness->ubigeo()->associate($objUbigeo);
        $objBusiness->save();

        // Se crea la sucursal principal
        $objBranchOffice = new Sucursal();
        $objBranchOffice->fill([
            "codigo_sunat" => "0000",
            "nombre" => "Sucursal Principal",
            "direccion" => "---",
            "urbanizacion" => "",
            "direccion_completa" => "---",
            "informacion_adicional" => "",
            "estado" => 1,
            "created_at" => $now,
        ]);
        $objBranchOffice->business()->associate($objBusiness);
        $objBranchOffice->ubigeo()->associate($objUbigeo);
        $objBranchOffice->save();

        // Se crea el colaborador
        $objBusinessPartner = new SocioNegocio();
        $objBusinessPartner->fill([
            "cliente" => 0,
            "proveedor" => 0,
            "colaborador" => 0,
            "codigo_interno" => "01110010011011110110111101110100",
            "ruc" => "00000000000",
            "nro_documento" => "00000000",
            "razon_social" => "Super Administrador",
            "nombres" => "",
            "ape_paterno" => "",
            "ape_materno" => "",
            "pagina_web" => "anthonybaquerizo.com",
            "estado" => 1,
            "created_at" => $now,
        ]);
        $objBusinessPartner->documentType()->associate($objDocumentType);
        $objBusinessPartner->save();

        // Se asocia el colaborador root a la sucursal principal
        $objBusinessPartnerBranchOffice = new SocioNegocioSucursal();
        $objBusinessPartnerBranchOffice->fill([
            "estado" => 1,
        ]);
        $objBusinessPartnerBranchOffice->businessPartner()->associate($objBusinessPartner);
        $objBusinessPartnerBranchOffice->branchOffice()->associate($objBranchOffice);
        $objBusinessPartnerBranchOffice->save();

        // Se crea el rol Super administrador
        $objRol = new Rol();
        $objRol->fill([
            "nombre" => "Super Administrador",
            "estado" => 0,
        ]);
        $objRol->branchOffice()->associate($objBranchOffice);
        $objRol->save();

        // Se asignan las Operaciones al Rol (del super administrador)
        $operations = Operacion::all();
        if ($operations->count() > 0) {
            foreach ($operations as $operation) {
                $objRolOperation = new RolOperacion();
                $objRolOperation->setAttribute("estado", 1);
                $objRolOperation->rol()->associate($objRol);
                $objRolOperation->operation()->associate($operation);
                $objRolOperation->save();
            }
        }

        // Se crea el usuario
        $objUser = new Usuario();
        $objUser->fill([
            "usuario" => "superadmin",
            "contrasenia" => bcrypt("123456"),
            "idioma" => "es",
            "estado" => 1
        ]);
        $objUser->businessPartner()->associate($objBusinessPartner);
        $objUser->save();

        // Al usuario se le asigna a la sucursal y el rol
        $objUserBranchOffice = new UsuarioSucursal();
        $objUserBranchOffice->fill([
            "estado" => 1
        ]);
        $objUserBranchOffice->user()->associate($objUser);
        $objUserBranchOffice->branchOffice()->associate($objBranchOffice);
        $objUserBranchOffice->rol()->associate($objRol);
        $objUserBranchOffice->save();

    }
}
