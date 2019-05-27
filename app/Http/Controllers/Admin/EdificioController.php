<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyEdificioRequest;
use Illuminate\Support\Facades\Validator;

use App\Edificio;

class EdificioController extends Controller{ 

    public function index(){        
        abort_unless(\Gate::allows('edificio_access'), 403);//Comparar si tiene permisos
        $edificios = Edificio::all();
        return view('admin.edificios.index', compact('edificios'));
    }

     public function show(Edificio $edificio){
        abort_unless(\Gate::allows('edificio_show'), 403);
        return view('admin.edificios.show', compact('edificio'));
    }

    public function create(){
        $edificios = Edificio::all();    
        abort_unless(\Gate::allows('edificio_create'), 403);
        return view('admin.edificios.create', compact('edificios'));
    }

    public function store(Request $request){    
       abort_unless(\Gate::allows('edificio_create'), 403);
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255445',
         ]);
        if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.edificios.create')
                        ->withErrors($validator)
                        ->withInput();
            }
        
        $edificio = Edificio::create($request->all());
        $edificios = Edificio::all();
        $notificacion = array(
            'message' => 'edificio creada con exito.', 
            'alert-type' => 'success'
        );

        return view('admin.edificios.index', compact('edificios', 'notificacion'));
    }

    public function edit(Edificio $edificio){
        $edificios = Edificio::all();
        abort_unless(\Gate::allows('edificio_edit'), 403);      
        return view('admin.edificios.edit', compact('edificio'));
    }

    public function update(Request $request, Edificio $edificio){

        abort_unless(\Gate::allows('edificio_edit'), 403);
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:Edificios,nombre,' .$edificio->id,
            'descripcion' => 'required|string|max:255445',

        ]);

         if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.edificios.edit', $edificio)
                        ->withErrors($validator)
                        ->withInput();
            }
      
         Edificio::findOrFail($edificio->id)->update($request->all());
        $edificio->update($request->all());
        $edificios = Edificio::all();
        $notificacion = array(
            'message' => 'edificio creado con exito.', 
            'alert-type' => 'success'
        );
        return view('admin.edificios.index', compact('edificios', 'notificacion'));

    }

   

    public function destroy(Edificio $edificio){
        abort_unless(\Gate::allows('edificio_delete'), 403);
        $edificio->delete();       
        $notificacion = array(
            'message' => 'edificio eliminado con exito.', 
            'alert-type' => 'Danger'
        );
        return redirect()->back()->with($notificacion);
    }

    public function massDestroy(MassDestroyEdificioRequest $request){
        Edificio::whereIn('id', request('ids'))->delete();
        $notificacion = array(
            'message' => 'edificios Eliminados con exito.', 
            'alert-type' => 'Danger'
        );
        return redirect()->back()->with($notificacion);
    }
}
