<?php

namespace App\Http\Controllers\Api\V1;

use App\Software;
use App\Caracteristica;
use App\Tipo;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $softwares=Software::all();
        return view('modules.softwares.index', compact('softwares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $caracteristicas=Caracteristica::all();
        $tipos=Tipo::all();
        return view('modules.softwares.create', compact('caracteristicas','tipos'));

       
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
            'tipos_id' => 'required|string',
            'descripcion' => 'required|string|max:255',            
            'user_id' => 'required|string',

        ]);
        if ($validator->fails()) {
            return redirect()
                        ->route('softwares.create')
                        ->withErrors($validator)
                        ->withInput();
        }
         Softwares::create($request->all());
        return redirect()->route('softwares.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Software $software)
    {
        //

        $softwares=Softwares::findOrFail($software->id);

        return view('modules.softwares.show', compact('softwares'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Software $software)
    {
        //
        
        $softwares=Softwares::findOrFail($software->id);
        $tipos=Tipo::all();
        return view('modules.softwares.edit', compact('softwares','tipos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Software $software)
    {
        //

        
         $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'tipos_id' => 'required|string',
            'descripcion' => 'required|string|max:255',            
            'user_id' => 'required|string',

       
        ]);

         if ($validator->fails()) {            
           return redirect()
                        ->route('softwares.edit', $software)
                        ->withErrors($validator)
                        ->withInput();
            }
      

        Softwares::findOrFail($software->id)->update($request->all());
        return redirect()->route('softwares.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\softwares  $softwares
     * @return \Illuminate\Http\Response
     */
    public function destroy(Software $software)
    {
        //
      $softwares=Softwares::findOrFail($software->id)->delete();
  
        
        return redirect()->route('softwares.index');

    }



}