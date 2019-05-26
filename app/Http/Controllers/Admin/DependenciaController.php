<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyDependenciaRequest;
use App\Http\Requests\Admin\StoreDepenciasRequest;
use App\Http\Requests\Admin\UpdateDepenciasRequest;
use App\General;
use App\Role;
use App\Cliente;
use App\Dependencia;

class DependenciaController extends Controller{ 

    public function index(){        
        abort_unless(\Gate::allows('dependencia_access'), 403);//Comparar si tiene permisos
        $dependencias = Dependencia::all();
        return view('admin.dependencias.index', compact('dependencias'));
    }

     public function show(Cliente $dependencia){
        abort_unless(\Gate::allows('dependencia_show'), 403);
        return view('admin.dependencias.show', compact('dependencia'));
    }


    public function create(){
        $edificios = Edificio::all()->pluck('nombre', 'id');
        abort_unless(\Gate::allows('dependencia_create'), 403);
        return view('admin.dependencias.create', compact('edificios'));
    }

    public function store(StoreDepenciasRequest $request){
        abort_unless(\Gate::allows('dependencia_create'), 403);
        $dependencia = Dependencia::create($request->all());
        $dependencia->edificios()->sync($request->input('edificios', []));
        $dependencias = Dependencia::all();
        $notificacion = array(
            'message' => 'Clientes agregados con exito.', 
            'alert-type' => 'success'
        );
        return view('admin.dependencias.index', compact('dependencias', 'notificacion'));
    }

    public function edit(Cliente $dependencia){
        $dependencias = Dependencia::all()->pluck('nombre', 'id');
        $dependencia->load('edificios','dependencias');
        abort_unless(\Gate::allows('dependencia_edit'), 403);      
        return view('admin.dependencias.edit', compact('edificios','enumoption', 'dependencias', 'cliente'));
    }

    public function update(UpdateDepenciasRequest $request, Cliente $dependencia){
        abort_unless(\Gate::allows('dependencia_edit'), 403);    
        $dependencia->update($request->all());
        $dependencia->roles()->sync($request->input('roles', []));
        $dependencias = Dependencia::all();
        $notificacion = array(
            'message' => 'Usuario creado con exito.', 
            'alert-type' => 'success'
        );
        return view('admin.dependencias.index', compact('dependencias', 'notificacion'));
    }

   

    public function destroy(Cliente $dependencia){
        abort_unless(\Gate::allows('dependencia_delete'), 403);
        $dependencia->delete();       
        $notificacion = array(
            'message' => 'Usuario eliminado con exito.', 
            'alert-type' => 'Danger'
        );
        return redirect()->back()->with($notificacion);
    }

    public function massDestroy(MassDestroyDependenciaRequest $request){
        Dependencia::whereIn('id', request('ids'))->delete();
        $notificacion = array(
            'message' => 'Usuarios Eliminados con exito.', 
            'alert-type' => 'Danger'
        );
        return redirect()->back()->with($notificacion);
    }
}
