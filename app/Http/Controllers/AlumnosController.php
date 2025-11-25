<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Alumno; 
use App\Models\Fcurso;

class AlumnosController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::with('curso')->get(); 

        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        $cursos = Fcurso::all();
        return view('alumnos.create', compact('cursos'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'txt_nombre' => 'required|max:100',
            'sel_curso' => 'required|exists:kvm_fcurso,FCU_COD',
        ]);
        
        Alumno::create([
            'ALUM_NOMBRES' => $request->txt_nombre,
            'ALUM_CODCUR' => $request->sel_curso,
        ]);

        return redirect()->route('alumnos.index')->with('success', 'Alumno guardado exitosamente.');
    }

    public function edit($id)
    {
        $alumno = Alumno::findOrFail($id); 
        $cursos = Fcurso::all(); 
    
        return view('alumnos.modificar', compact('alumno', 'cursos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'txt_nombre' => 'required|max:100',
            'sel_curso' => 'required|exists:kvm_fcurso,FCU_COD', 
        ]);

        $alumno = Alumno::findOrFail($id);
        $alumno->update([
            'ALUM_NOMBRES' => $request->txt_nombre,
            'ALUM_CODCUR' => $request->sel_curso,
        ]);

        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id); 
        $alumno->delete(); 

        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado exitosamente.');
    }
}