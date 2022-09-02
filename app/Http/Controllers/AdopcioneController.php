<?php

namespace App\Http\Controllers;

use App\Models\Adopcione;
use Illuminate\Http\Request;

/**
 * Class AdopcioneController
 * @package App\Http\Controllers
 */
class AdopcioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adopciones = Adopcione::paginate();

        return view('adopcione.index', compact('adopciones'))
            ->with('i', (request()->input('page', 1) - 1) * $adopciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adopcione = new Adopcione();
        return view('adopcione.create', compact('adopcione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Adopcione::$rules);

        $datosAdopciones = request()->except('_token');

        if($request->hasFile('foto')){
            $datosAdopciones['foto']=$request->file('foto')->store('uploads','public');
        }
        
        Adopcione::create($datosAdopciones);

        return redirect()->route('adopciones.index')
            ->with('success', 'Mascota añadida');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adopcione = Adopcione::find($id);

        return view('adopcione.show', compact('adopcione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adopcione = Adopcione::find($id);

        return view('adopcione.edit', compact('adopcione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Adopcione $adopcione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adopcione $adopcione)
    {
        request()->validate(Adopcione::$rules);

        $datosAdopciones = request()->except(['_token','_method']);

        if($request->hasFile('foto')){
            $datosAdopciones['foto']=$request->file('foto')->store('uploads','public');
        }

        $adopcione->update($datosAdopciones);

        return redirect()->route('adopciones.index')
            ->with('success', 'Mascota actualizada correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $adopcione = Adopcione::find($id)->delete();

        return redirect()->route('adopciones.index')
            ->with('danger', 'Mascota eliminada del registro de adopciones');
    }
}
