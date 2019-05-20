<?php

namespace App\Http\Controllers\Api\V1;

use App\Cliente;
use App\Http\Controllers\Controller;
use App\Http\Resources\Cliente as ClienteResource;
use App\Http\Requests\Admin\StoreClientesRequest;
use App\Http\Requests\Admin\UpdateClientesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;



class ClientesController extends Controller
{
    public function index()
    {
        return new ClienteResource(Cliente::with(['dependencia', 'user'])->get());

    }

    public function show($id)
    {
        if (Gate::denies('cliente_view')) {
            return abort(401);
        }

        $cliente = Cliente::with(['dependencia', 'user'])->findOrFail($id);

        return new ClienteResource($cliente);
    }

    public function store(StoreClientesRequest $request)
    {
        if (Gate::denies('cliente_create')) {
            return abort(401);
        }

        $cliente = Cliente::create($request->all());
        
        

        return (new ClienteResource($clientee))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateClientesRequest $request, $id)
    {
        if (Gate::denies('cliente_edit')) {
            return abort(401);
        }

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        
        
        

        return (new ClienteResource($clientee))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        if (Gate::denies('cliente_delete')) {
            return abort(401);
        }

        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return response(null, 204);
    }
}
