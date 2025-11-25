<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Fcurso; 
use App\Models\Ciclo;
class CursosController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->get('txt_buscar');

        if ($buscar) {
            $cursos = Fcurso::where('FCU_DESCRI', 'like', '%' . $buscar . '%')
                            ->orWhere('FCU_COD', 'like', '%' . $buscar . '%')
                            ->get();
        } else {
            $cursos = Fcurso::all(); 
        }

        $ciclos = Ciclo::all();

        if ($request->ajax()) {
            return view('cursos.tabla', compact('cursos'));
        }

        return view('cursos.index', compact('cursos', 'ciclos'));
    }

    public function create()
    {
        $ciclos = Ciclo::all(); 
        return view('cursos.create', compact('ciclos'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'txt_descripcion' => 'required|max:20',
            'sel_ciclo' => 'required|exists:kvm_ciclo,CIC_CODI',
        ]);
    
        Fcurso::create([
            'FCU_DESCRI' => $request->txt_descripcion,
            'FCU_CIC' => $request->sel_ciclo,
        ]);

        return redirect()->route('cursos.index')
                     ->with('success', 'Curso guardado exitosamente.');
    }

    public function edit($id)
    {

        $curso = Fcurso::findOrFail($id); 
        $ciclos = Ciclo::all(); 
    
        return view('cursos.modificar', compact('curso', 'ciclos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'txt_descripcion' => 'required|max:20',
            'sel_ciclo' => 'required|exists:kvm_ciclo,CIC_CODI', 
        ]);

        $curso = Fcurso::findOrFail($id);
        $curso->update([
            'FCU_DESCRI' => $request->txt_descripcion,
            'FCU_CIC' => $request->sel_ciclo,
        ]);

        return redirect()->route('cursos.index')->with('success', 'Curso actualizado exitosamente.');
    }   


    public function destroy($id)
    {
        $curso = Fcurso::findOrFail($id); 
        $curso->delete(); 

        return redirect()->route('cursos.index')->with('success', 'Curso eliminado exitosamente.');
    }

}