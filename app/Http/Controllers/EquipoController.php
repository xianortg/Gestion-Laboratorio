<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = \App\Models\Equipo::all();
        return view('equipos.index', compact('equipos'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(\Illuminate\Http\Request $request)
{
    $equipo = new \App\Models\Equipo();

    $equipo->nombre = $request->input('nombre');
    $equipo->numero_serie = $request->input('numero_serie');
    $equipo->descripcion = $request->input('descripcion');

    $equipo->save();

    return redirect()->route('equipos.index');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $equipo = Equipo::findOrFail($id);
        return view('equipos.edit', compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $equipo = Equipo::findOrFail($id);

        $equipo->nombre = $request->nombre;
        $equipo->numero_serie = $request->numero_serie;
        $equipo->descripcion = $request->descripcion;

        $equipo->save();

    return redirect()->route('equipos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->delete();

        return redirect()->route('equipos.index');
    }
}
