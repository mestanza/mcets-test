<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Grupo;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::latest()->paginate(5);
        return view('usuario.index', compact('usuarios'))
                ->with('i', (request()->input('page', 1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupos = Grupo::all();
        return view('usuario.crear', compact('grupos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $path = $request->file('img')->store('img');

        if($request->hasFile('img')){
            $file = $request->file('img');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }

        if(!isset($name)){
            $name = 'user.jpg';
        }

        $request->validate([
            'name' => 'required',
            'email'=> 'required',
            'password' => 'required|confirmed|min:6',
            'grupo_id' => 'required',
        ]);

        $email = User::where('email', $request->email)->first();

        if(empty($email)){
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'grupo_id' => $request['grupo_id'],
                'img'   => $name
            ]);
            return redirect()->route('usuario.index')
            ->with('success', 'Nuevo Usuario registrado');
        }else{
            return redirect()->route('usuario.create')
            ->with('warning', 'Email ya existe en los registros, por favor ingresar otro email');   
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalles = User::find($id);

        $grupo = Grupo::where('id', $detalles->grupo_id)->first();

        return view('usuario.detalle', compact('detalles', 'grupo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);

        $grupos = Grupo::all();

        return view('usuario.editar', compact('usuario', 'grupos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email'=> 'required',
            'password' => 'required',
            'grupo_id' => 'required'
        ]);

        $usuario = User::find($id);

        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
        $usuario->password = Hash::make($request->get('password')); 
        $usuario->grupo_id = $request->get('grupo_id');
        $usuario->save();
        return redirect()->route('usuario.index')
                ->with('success', 'Usuario Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        return redirect()->route('usuario.index')
                ->with('success', 'Usuario ha sido eliminado');
    }
}
