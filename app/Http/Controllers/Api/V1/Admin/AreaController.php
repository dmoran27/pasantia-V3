<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Buider;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $areas=Area::all();
        
        //return view('areas.index', compact('areas'));
        return $areas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $areas=Area::all();
        return view('areas.create', compact('areas'));
       
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

        ]);
        
        if ($validator->fails()) {
            return redirect()
                        ->route('areas.create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Area::create($request->all());
        return redirect()->route('areas.index');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //

        $areas=Area::findOrFail($area->id);
        return view('areas.show', compact('areas'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        //
        
        $areas=Area::findOrFail($area->id);
        $areas=Area::all();
        $enumoption = General::getEnumValues('areas') ;
       
        return view('areas.edit', compact('areas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Area $area)
    {
        //

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',

        ]);


         if ($validator->fails()) {
            
           return redirect()
                        ->route('areas.edit', $area)
                        ->withErrors($validator)
                        ->withInput();
            }
      

        Area::findOrFail($area->id)->update($request->all());
        return redirect()->route('areas.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\areas  $areas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        //
      $areas=Area::findOrFail($area->id)->delete();
  
        
        return redirect()->route('areas.index');

    }

}
