<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class MascotaController
 * @package App\Http\Controllers
 */
class MascotaController extends Controller
{

    public function index()
    {
        $mascotas = Mascota::paginate();
        return view('mascota.index', compact('mascotas'))
            ->with('i', (request()->input('page', 1) - 1) * $mascotas->perPage());
    }

    public function create()
    {
        $mascota = new Mascota();
        $clientes= Cliente::pluck('nombre','id');
        return view('mascota.create', compact('mascota','clientes'));
    }

    public function store(Request $request)
    {
        request()->validate(Mascota::$rules);
        $datosMascota = request()->except('_token');

        if($request->hasFile('foto')){
            $datosMascota['foto']=$request->file('foto')->store('uploads','public');
        }
        
        Mascota::insert($datosMascota);
        return redirect()->route('mascotas.index')
            ->with('success', 'Mascota añadida');
    }

    public function show($id)
    {
        $mascota = Mascota::find($id);
        return view('mascota.show', compact('mascota'));
    }

    public function edit($id)
    {
        $mascota = Mascota::find($id);
        $clientes= Cliente::pluck('nombre','id');
        return view('mascota.edit', compact('mascota','clientes'));
    }

    public function update(Request $request, Mascota $mascota)
    {
        request()->validate(Mascota::$rules);
        $datosMascota = request()->except(['_token','_method']);

        if($request->hasFile('foto')){
            $datosMascota['foto']=$request->file('foto')->store('uploads','public');
        }
        
        $mascota->update($datosMascota);
        return redirect()->route('mascotas.index')
            ->with('success', 'Mascota actualizada correctamente');
    }


    public function destroy($id)
    {
        $mascota = Mascota::find($id)->delete();
        return redirect()->route('mascotas.index')
            ->with('danger', 'Mascota eliminada del registro');
    }
}
