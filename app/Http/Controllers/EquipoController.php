<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Aula;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::with('aula')->get();
        $aulas = Aula::all();
        return view('equipos.index', compact('equipos', 'aulas'));
    }

    public function create()
    {
        $aulas = Aula::all();
        return view('equipos.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $equipo = new Equipo();
        $equipo->nombre = $request->nombre;
        $equipo->numero_serie = $request->numero_serie;
        $equipo->descripcion = $request->descripcion;
        $equipo->aula_id = $request->aula_id;

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('imagenes', 'public');
            $equipo->imagen_ruta = 'storage/' . $path;
        }

        $equipo->save();

        return redirect()->route('equipos.index')->with('success', 'Equipo creado correctamente');
    }

    public function edit(string $id)
    {
        $equipo = Equipo::findOrFail($id);
        $aulas = Aula::all();
        return view('equipos.edit', compact('equipo', 'aulas'));
    }

    public function update(Request $request, string $id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->nombre = $request->nombre;
        $equipo->numero_serie = $request->numero_serie;
        $equipo->descripcion = $request->descripcion;
        $equipo->aula_id = $request->aula_id;

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('imagenes', 'public');
            $equipo->imagen_ruta = 'storage/' . $path;
        }

        $equipo->save();

        return redirect()->route('equipos.index')->with('success', 'Equipo actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->delete();

        return redirect()->route('equipos.index')->with('success', 'Equipo eliminado correctamente');
    }

    // 🚀 Método agregado para evitar el error
    public function show(string $id)
    {
        // En vez de mostrar detalle, redirigimos directo a editar
        return redirect()->route('equipos.edit', $id);
    }
}
