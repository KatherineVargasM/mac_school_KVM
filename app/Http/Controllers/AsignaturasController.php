<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asig; 

class AsignaturasController extends Controller
{

    public function index()
    {
        $asignaturas = Asig::all(); 
        return view('asignaturas.index', compact('asignaturas'));
    }
    public function create()
    {
        return view('asignaturas.create'); 
    }

    public function store(Request $request)
    {

        $request->validate([
            'txt_nombre' => 'required|max:20', 
            'txt_observacion' => 'nullable|max:50', 
        ]);
        
        Asig::create([
            'ASIG_NOMBRE' => $request->txt_nombre, 
            'ASIG_OBSERV' => $request->txt_observacion,
        ]);

        return redirect('/asignaturas')
                         ->with('success', 'Asignatura guardada exitosamente.');
    }


    public function edit($id)
    {   

        $asignatura = Asig::findOrFail($id); 
        return view('asignaturas.modificar', compact('asignatura'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'txt_nombre' => 'required|max:20',
            'txt_observacion' => 'nullable|max:50',
        ]);

        $asignatura = Asig::findOrFail($id);

        $asignatura->update([
            'ASIG_NOMBRE' => $request->txt_nombre,
            'ASIG_OBSERV' => $request->txt_observacion,
        ]);

        return redirect('/asignaturas')
                     ->with('success', 'Asignatura actualizada exitosamente.');
    }


    public function destroy($id)
    {

        $asignatura = Asig::findOrFail($id); 
        $asignatura->delete(); 

        return redirect('/asignaturas')
                     ->with('success', 'Asignatura eliminada exitosamente.');
    }

}