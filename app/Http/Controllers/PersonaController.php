<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Http\Requests\PersonaRequest;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::all();
        return view('persona.index', compact('personas'));
    }

    public function create()
    {
        return view('persona.create');
    }

    public function store(PersonaRequest $request)
    {
        Persona::create($request->validated());

        return redirect()->route('persona.create')->with('success', 'Persona creada exitosamente');
    }

    public function edit($id)
    {
        $persona = Persona::findOrFail($id);
        return view('persona.edit', compact('persona'));
    }

    public function update(PersonaRequest $request, $id)
    {
        $persona = Persona::findOrFail($id);
        $persona->update($request->validated());

        return redirect()->route('personas.index')->with('success', 'Persona actualizada exitosamente');
    }

    public function updateList()
    {
        $personas = Persona::all();
        return view('persona.updateList', compact('personas'));
    }
    public function eliminarPersonas()
    {
        $personas = Persona::all();
        return view('persona.eliminar', compact('personas'));
    }
    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        $persona->delete();

        return redirect()->route('personas.index')->with('success', 'Persona eliminada exitosamente');
    }

}
