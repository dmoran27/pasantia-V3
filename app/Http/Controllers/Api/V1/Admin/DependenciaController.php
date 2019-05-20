<?php

namespace App\Http\Controllers\Api\V1;

use App\Dependencia;
use App\Http\Controllers\Controller;
use App\Http\Resources\Dependencia as DependenciaResource;
use App\Http\Requests\Admin\StoreDependenciasRequest;
use App\Http\Requests\Admin\UpdateDependenciasRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class DependenciasController extends Controller
{
    public function index()
    {
        return new DependenciaResource(Dependencia::with([])->get());

    }

    public function show($id)
    {
        if (Gate::denies('dependencia_view')) {
            return abort(401);
        }

        $dependencia = Dependencia::with(['tipo'])->findOrFail($id);

        $return new DependenciaResource($dependencia);
    }

    public function store(StoreDependenciasRequest $request)
    {
        if (Gate::denies('dependencia_create')) {
            return abort(401);
        }

        $dependencia = Dependencia::create($request->all());
        
        

        return (new DependenciaResource($dependencia))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateDependenciasRequest $request, $id)
    {
        if (Gate::denies('dependencia_edit')) {
            return abort(401);
        }

        $dependencia = Dependencia::findOrFail($id);
        $dependencia->update($request->all());
        
        
        

        return (new DependenciaResource($dependencia))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('dependencia_delete')) {
            return abort(401);
        }

        $dependencia = Dependencia::findOrFail($id);
        $dependencia->delete();

        return response(null, 204);
    }
}
