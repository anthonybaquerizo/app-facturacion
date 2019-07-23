<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ubigeo extends Model
{

    protected $table = "ubigeos";

    public $incrementing = false;

    protected $keyType = "string";

    public $timestamps = false;

    protected $primaryKey = "id";

    protected $fillable = [
        "nombre",
        "estado"
    ];

    /**
     * Devuelve todas las empresas del ubigeo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function business()
    {
        return $this->hasMany(Empresa::class, "ubigeo_id");
    }

    /**
     * Devuelve todas las empresas del ubigeo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branchOffice()
    {
        return $this->hasMany(Sucursal::class, "ubigeo_id");
    }

}
