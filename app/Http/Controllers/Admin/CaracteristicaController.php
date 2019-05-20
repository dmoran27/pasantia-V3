<?php

namespace App\Http\Controllers\Admin;
use App\Caracteristica;
use App\Http\Controllers\Controller;
use App\Http\Resources\Caracteristica as CaracteristicaResource;
use App\Http\Requests\Admin\StoreCaracteristicasRequest;
use App\Http\Requests\Admin\UpdateCaracteristicasRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class CaracteristicasController extends Controller
{
    public function index()
    {
        if (Gate::denies('caracteristica_access')) {
            return abort(401);
        }

        return new CaracteristicaResource::all();
    }

    public function show($id)
    {
        if (Gate::denies('caracteristica_view')) {
            return abort(401);
        }

        $caracteristica = Caracteristica::findOrFail($id);

        return new CaracteristicaResource($caracteristica);
    }

    public function store(StoreCaracteristicasRequest $request)
    {
        if (Gate::denies('caracteristica_create')) {
            return abort(401);
        }

        $caracteristica = Caracteristica::create($request->all());
        $caracteristica->role()->sync($request->input('role', []));
        

        return (new CaracteristicaResource($caracteristica))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateCaracteristicasRequest $request, $id)
    {
         if (Gate::denies('caracteristica_edit')) {
            return abort(401);
        }

        $caracteristica = Caracteristica::findOrFail($id);
        $caracteristica->update($request->all());     
        
        return (new caracteristicaResource($caracteristica))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('caracteristica_delete')) {
            return abort(401);
        }

        $caracteristica = Caracteristica::findOrFail($id);
        $caracteristica->delete();

        return response(null, 204);
    }
}
