<?php

namespace App\Http\Controllers\Api\V1;
use App\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Buider;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipos=Tipo::all();
        
        return view('modules.tipos.index', compact('tipos'));
        //return $tipos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $tipos=Tipo::all();
        return view('modules.tipos.create', compact('tipos'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    

    public function store(Request $request)
    {
        //
         $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'user_id' => 'required|string',

        ]);
        
        if ($validator->fails()) {
            return redirect()
                        ->route('tipos.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Tipo::create($request->all());
        return redirect()->route('tipos.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo $tipo)
    {
        //

        $tipos=Tipo::findOrFail($tipo->id);
        return view('modules.tipos.show', compact('tipos'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipo $tipo)
    {
        //
        
        $tipos=Tipo::findOrFail($tipo->id);
       
        return view('modules.tipos.edit', compact('tipos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Tipo $tipo)
    {
        //

         $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'user_id' => 'required|string',

        ]);


         if ($validator->fails()) {
            
           return redirect()
                        ->route('tipos.edit', $tipo)
                        ->withErrors($validator)
                        ->withInput();
            }
      

        Tipo::findOrFail($tipo->id)->update($request->all());
        return redirect()->route('tipos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tipos  $tipos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo $tipo)
    {
        //
      $tipos=Tipo::findOrFail($tipo->id)->delete();
  
        
        return redirect()->route('tipos.index');

    }

}
