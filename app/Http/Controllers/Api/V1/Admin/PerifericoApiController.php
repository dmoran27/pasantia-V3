<?php

namespace App\Http\Controllers\Api\V1;

use App\Periferico;
use App\Http\Controllers\Controller;
use App\Http\Resources\Periferico as PerifericoResource;
use App\Http\Requests\Admin\StorePerifericosRequest;
use App\Http\Requests\Admin\UpdatePerifericosRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class PerifericosController extends Controller


{
    public function index()
    {
        

        if (Gate::denies('periferico_access')) {
            return abort(401);
        }

        return PerifericoResource::all();
    }

    public function show($id)
    {
        if (Gate::denies('periferico_view')) {
            return abort(401);
        }

        $periferico = Periferico::with(['tipo'])->findOrFail($id);

        return new PerifericoResource($periferico;
    }

    public function store(StorePerifericosRequest $request)
    {
        if (Gate::denies('periferico_create')) {
            return abort(401);
        }

        $periferico = Periferico::create($request->all());
        
        

        return (new PerifericoResource($periferico))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdatePerifericosRequest $request, $id)
    {
        if (Gate::denies('periferico_edit')) {
            return abort(401);
        }

        $periferico = Periferico::findOrFail($id);
        $periferico->update($request->all());
        
        
        

        return (new PerifericoResource($periferico))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('periferico_delete')) {
            return abort(401);
        }

        $periferico = Periferico::findOrFail($id);
        $periferico->delete();

        return response(null, 204);
    }
}
