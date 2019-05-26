<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyClienteRequest;
use App\Http\Requests\Admin\StoreClientesRequest;
use App\Http\Requests\Admin\UpdateClientesRequest;
use App\General;
use App\Role;
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
        $dependencias = Dependencia::all()->pluck('nombre', 'id');
        $enumoption = General::getEnumValues('clientes','sexo');
        $enumoption2 = General::getEnumValues('tipos','sexo');
        $cliente->load('roles','dependencias');
        abort_unless(\Gate::allows('cliente_create'), 403);
        return view('admin.clientes.create', compact('roles', 'enumoption', 'enumoption2', 'dependencias', 'cliente'));
    }

    public function store(StoreClientesRequest $request){
        abort_unless(\Gate::allows('cliente_create'), 403);
        $cliente = Cliente::create($request->all());
        $cliente->roles()->sync($request->input('roles', []));
        $clientes = Cliente::all();
        $notificacion = array(
            'message' => 'Clientes agregados con exito.', 
            'alert-type' => 'success'
        );
        return view('admin.clientes.index', compact('clientes', 'notificacion'));
    }

    public function edit(Cliente $cliente){
        $dependencias = Dependencia::all()->pluck('nombre', 'id');
         $enumoption2 = General::getEnumValues('tipos','sexo');
        $enumoption = General::getEnumValues('clientes','sexo');
        $cliente->load('roles','dependencias');
        abort_unless(\Gate::allows('cliente_edit'), 403);      
        return view('admin.clientes.edit', compact('roles','enumoption', 'dependencias', 'cliente'));
    }

    public function update(UpdateClientesRequest $request, Cliente $cliente){
        abort_unless(\Gate::allows('cliente_edit'), 403);    
        $cliente->update($request->all());
        $cliente->roles()->sync($request->input('roles', []));
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
