<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyClienteRequest;
use Illuminate\Support\Facades\Validator;
use App\General;
use App\Cliente;
use App\Dependencia;

class ClienteController extends Controller{ 

    public function index(){        
        abort_unless(\Gate::allows('cliente_access'), 403);//Comparar si tiene permisos
        $clientes = Cliente::all();
        return view('admin.clientes.index', compact('clientes'));
    }

     public function show(Cliente $cliente){
        abort_unless(\Gate::allows('cliente_show'), 403);
        return view('admin.clientes.show', compact('cliente'));
    }

    public function create(){

        abort_unless(\Gate::allows('cliente_create'), 403);

        $dependencias = Dependencia::all();
        $enumoption = General::getEnumValues('clientes','sexo');
        $enumoption2 = General::getEnumValues('clientes','tipo');
        return view('admin.clientes.create', compact('enumoption', 'enumoption2', 'dependencias'));
    }

    public function store(Request $request){
        abort_unless(\Gate::allows('cliente_create'), 403);
        $request["user_id"]=auth()->user()->id;
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cedula' => 'required|string|unique:clientes|max:10',
            'telefono' => 'string|max:50|nullable',
            'sexo' => 'required',
            'tipo' => 'required',
            'dependencia_id' => 'required',
            'email' => 'string|email|max:255|nullable',
            'user_id'=> 'required',
        ]);
        if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.clientes.create')
                        ->withErrors($validator)
                        ->withInput();
            }
        
        $cliente = Cliente::create($request->all());

         if(request()->ajax()){

              return response()->json($cliente->id);
         }

        $clientes = Cliente::all();
        $notificacion = array(
            'message' => 'Clientes agregados con exito.', 
            'alert-type' => 'success'
        );
        return view('admin.clientes.index', compact('clientes', 'notificacion'));
    }

    public function edit(Cliente $cliente){
        $dependencias = Dependencia::all();
         $enumoption2 = General::getEnumValues('clientes','tipo');
        $enumoption = General::getEnumValues('clientes','sexo');
        abort_unless(\Gate::allows('cliente_edit'), 403);      
        return view('admin.clientes.edit', compact('enumoption','enumoption2', 'dependencias', 'cliente'));
    }

    public function update(Request $request, Cliente $cliente){
        abort_unless(\Gate::allows('cliente_edit'), 403); 
         $request["user_id"]=auth()->user()->id;
        $validator = Validator::make($request->all(), [
           'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cedula' => 'required|string|max:10',
            'telefono' => 'string|max:50|nullable',
            'sexo' => 'required|string|max:10',
            'tipo' => 'required|string|max:20',
            'dependencia_id' => 'required|string|max:255',
            'email' => 'string|email|max:255|nullable',
            'user_id'=> 'required',
        ]);

         if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.clientes.edit', $user)
                        ->withErrors($validator)
                        ->withInput();
            }  
        
        $cliente->update($request->all());
        $clientes = Cliente::all();
        $notificacion = array(
            'message' => 'Usuario creado con exito.', 
            'alert-type' => 'success'
        );
        return view('admin.clientes.index', compact('clientes', 'notificacion'));
    }

   

    public function destroy(Cliente $cliente){
        abort_unless(\Gate::allows('cliente_delete'), 403);
        $cliente->delete();       
        $notificacion = array(
            'message' => 'Usuario eliminado con exito.', 
            'alert-type' => 'Danger'
        );
        return redirect()->back()->with($notificacion);
    }

    public function massDestroy(MassDestroyClienteRequest $request){
        Cliente::whereIn('id', request('ids'))->delete();
        $notificacion = array(
            'message' => 'Usuarios Eliminados con exito.', 
            'alert-type' => 'Danger'
        );
        return redirect()->back()->with($notificacion);
    }
}
