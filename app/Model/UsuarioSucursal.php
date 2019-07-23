<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UsuarioSucursal extends Model
{

    protected $table = "usuario_sucursales";

    protected $primaryKey = "id";

    protected $fillable = [
        "estado"
    ];

    /**
     * Devuelve el usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Usuario::class, "usuario_id");
    }

    /**
     * Devuelve la sucursal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branchOffice()
    {
        return $this->belongsTo(Sucursal::class, "sucursal_id");
    }

    /**
     * Devuelve el rol al que pertenece el usuario y el rol
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rol()
    {
        return $this->belongsTo(Rol::class, "rol_id");
    }

}
