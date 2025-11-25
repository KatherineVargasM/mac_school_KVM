<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pers;

class PersonalController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->get('txt_buscar');

        if ($buscar) {
            $personal = Pers::where('PER_APENOM', 'like', '%' . $buscar . '%')
                            ->orWhere('PER_CEDULA', 'like', '%' . $buscar . '%')
                            ->get();
        } else {
            $personal = Pers::all(); 
        }

        if ($request->ajax()) {
            return view('personal.tabla', compact('personal'));
        }

        return view('personal.index', compact('personal'));
    }

    public function create()
    {
        return view('personal.create'); 
    }


    public function store(Request $request)
    {
        $request->validate([
            'txt_nombre' => 'required|max:80',
            'txt_cedula' => 'required|max:16|unique:kvm_pers,PER_CEDULA', 
        ]);
    

        Pers::create([
            'PER_APENOM' => $request->txt_nombre,
            'PER_CEDULA' => $request->txt_cedula,
        ]);

        return redirect()->route('personal.index')
                     ->with('success', 'Personal agregado exitosamente.');
    }

    public function edit($id)
    {
        $persona = Pers::findOrFail($id); 
        return view('personal.modificar', compact('persona'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'txt_nombre' => 'required|max:80',
            'txt_cedula' => 'required|max:16|unique:kvm_pers,PER_CEDULA,' . $id . ',PER_CODIGO',
        ]);

        $persona = Pers::findOrFail($id);
        $persona->update([
            'PER_APENOM' => $request->txt_nombre,
            'PER_CEDULA' => $request->txt_cedula,
        ]);

        return redirect()->route('personal.index')->with('success', 'Registro de Personal actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $persona = Pers::findOrFail($id); 
        $persona->delete(); 

        return redirect()->route('personal.index')->with('success', 'Registro de Personal eliminado exitosamente.');
    }
}