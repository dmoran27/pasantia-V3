<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyDependenciaRequest;
use Illuminate\Support\Facades\Validator;
use App\Edificio;
use App\Dependencia;

class DependenciaController extends Controller{ 

    public function index(){        
        abort_unless(\Gate::allows('dependencia_access'), 403);//Comparar si tiene permisos
        $dependencias = Dependencia::all();
        return view('admin.dependencias.index', compact('dependencias'));
    }

     public function show(Dependencia $dependencia){
        abort_unless(\Gate::allows('dependencia_show'), 403);
        return view('admin.dependencias.show', compact('dependencia'));
    }


    public function create(){
        $edificios = Edificio::all();
        abort_unless(\Gate::allows('dependencia_create'), 403);
        return view('admin.dependencias.create', compact('edificios'));
    }

    public function store(Request $request){
        abort_unless(\Gate::allows('dependencia_create'), 403);
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'piso' => 'required|string|max:255445',
            'edificio_id' => 'required|string|max:255445',
         ]);
        if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.dependencias.create')
                        ->withErrors($validator)
                        ->withInput();
            }
        
        $dependencia = Dependencia::create($request->all());
        $dependencia->edificios()->sync($request->input('edificios', []));
        $dependencias = Dependencia::all();
        $notificacion = array(
            'message' => 'Clientes agregados con exito.', 
            'alert-type' => 'success'
        );
        return view('admin.dependencias.index', compact('dependencias', 'notificacion'));
    }

    public function edit(Dependencia $dependencia){
        
        $dependencia->load('edificio');
        $edificios = Edificio::all();
        abort_unless(\Gate::allows('dependencia_edit'), 403);      
        return view('admin.dependencias.edit', compact('edificios', 'dependencia'));
    }

    public function update(Request $request, Dependencia $dependencia){
        abort_unless(\Gate::allows('dependencia_edit'), 403);    
          $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'piso' => 'required|string|max:255445',
            'edificio_id' => 'required|string|max:255445',
         ]);
        $dependencia->update($request->all());
        $dependencia->edificio()->sync($request->input('edificio', []));
        $dependencias = Dependencia::all();
        $notificacion = array(
            'message' => 'Usuario creado con exito.', 
            'alert-type' => 'success'
        );
        return view('admin.dependencias.index', compact('dependencias', 'notificacion'));
    }

   

    public function destroy(Dependencia $dependencia){
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
