<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mascota
 *
 * @property $id
 * @property $nombre
 * @property $dueno
 * @property $foto
 * @property $especie
 * @property $edad
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Mascota extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'dueno' => 'required',
		'foto' => 'required|image|mimes:jpeg,png,jpg,svg|max:1024',
		'especie' => 'required',
		'edad' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['nombre','dueno','foto','especie','edad'];

    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'dueno');
    }
    

}
