<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $correo
 * @property $telefono
 * @property $created_at
 * @property $updated_at
 *
 * @property Mascota[] $mascotas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'apellido' => 'required',
		'correo' => 'required',
		'telefono' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['nombre','apellido','correo','telefono'];

    public function mascotas()
    {
        return $this->hasMany('App\Models\Mascota', 'dueno', 'id');
    }
    

}
