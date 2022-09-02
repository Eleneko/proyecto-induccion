<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Adopcione
 *
 * @property $id
 * @property $nombre
 * @property $foto
 * @property $especie
 * @property $edad_estimada
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Adopcione extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'foto' => 'required|image|mimes:jpeg,png,jpg,svg|max:1024',
		'especie' => 'required',
		'edad_estimada' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','foto','especie','edad_estimada'];



}
