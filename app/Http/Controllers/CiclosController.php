<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Ciclo; 

class CiclosController extends Controller
{
    public function index()
    {

        $ciclos = Ciclo::all(); 
        return view('ciclos.index', compact('ciclos'));
    }

    public function create()
    {
        return view('ciclos.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'txt_nombre' => 'required|max:50',
            'txt_observacion' => 'nullable|max:50',
        ]);

        Ciclo::create([
            'CIC_NOMB' => $request->txt_nombre,
            'CIC_OBSERV' => $request->txt_observacion,
        ]);

            return redirect()->route('ciclos.index')
                     ->with('success', 'Ciclo guardado exitosamente.');
    }

    public function edit($id)
    {

        $ciclo = Ciclo::findOrFail($id); 
        return view('ciclos.modificar', compact('ciclo'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'txt_nombre' => 'required|max:50',
            'txt_observacion' => 'nullable|max:50',
        ]);

        $ciclo = Ciclo::findOrFail($id);
        $ciclo->update([
            'CIC_NOMB' => $request->txt_nombre,
            'CIC_OBSERV' => $request->txt_observacion,
        ]);

        return redirect()->route('ciclos.index')
                     ->with('success', 'Ciclo actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $ciclo = Ciclo::findOrFail($id); 
        $ciclo->delete(); 

        return redirect()->route('ciclos.index')
                     ->with('success', 'Ciclo eliminado exitosamente.');
    }
}