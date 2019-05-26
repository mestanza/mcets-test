<?php

namespace App\Http\Controllers;

use App\GrupoUsuario;
use Illuminate\Http\Request;
use App\Grupo;

class GrupoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $grupos = Grupo::latest()->paginate(5);
        return view('grupo.index', compact('grupos'))
                ->with('i', (request()->input('page', 1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grupo.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $grupo = Grupo::where('nombre', $request->nombre)->first();

        if(empty($email)){
            Grupo::create([
                'nombre' => $request['nombre'],
            
            ]);
            return redirect()->route('grupoUsuario.index')
            ->with('success', 'Nuevo Grupo registrado');
        }else{
            return redirect()->route('grupoUsuario.create')
            ->with('warning', 'Grupo ya existe en los registros, por favor ingresar otro nombre de grupo');   
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GrupoUsuario  $grupoUsuario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalles = Grupo::find($id);

        return view('grupo.detalle', compact('detalles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GrupoUsuario  $grupoUsuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupos = Grupo::find($id);

        return view('grupo.editar', compact('grupos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GrupoUsuario  $grupoUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',

        ]);

        $grupo = Grupo::find($id);

        $grupo->nombre = $request->get('nombre');

        $grupo->save();
        return redirect()->route('grupoUsuario.index')
                ->with('success', 'Grupo Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GrupoUsuario  $grupoUsuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupo = Grupo::find($id);
        $grupo->delete();
        return redirect()->route('grupoUsuario.index')
                ->with('success', 'Grupo ha sido eliminado');
    }
}
