<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyCaracteristicaRequest;
use App\Http\Requests\Admin\StoreCaracteristicaRequest;
use App\Http\Requests\Admin\UpdateCaracteristicaRequest;
use App\General;
use App\Role;
use App\Caracteristica;
use App\Area;

class CaracteristicasController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('caracteristica_access'), 403);
        $caracteristicas = Caracteristica::all();
        return view('admin.caracteristicas.index', compact('Caracteristicas'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('caracteristica_create'), 403);
        $user = Role::all();
        return view('admin.caracteristicas.create', compact('user'));
    }

    public function store(StoreCaracteristicaRequest $request)
    {
        abort_unless(\Gate::allows('caracteristica_create'), 403);
        $caracteristica = Caracteristica::create($request->all());
        $caracteristica->user()->sync($request->input('user', []));
        return redirect()->route('admin.caracteristicas.index');
    }

    public function edit(Caracteristica $caracteristica)
    {
        abort_unless(\Gate::allows('caracteristica_edit'), 403);
        $user = User::all();
        $caracteristica->load('user','caracteristica');
        return view('admin.caracteristicas.edit', compact('user', 'caracteristica'));
    }

    public function update(UpdateCaracteristicaRequest $request, Caracteristica $caracteristica)
    {
        abort_unless(\Gate::allows('caracteristica_edit'), 403);
        $caracteristica->update($request->all());
        $caracteristica->user()->sync($request->input('user', []));
        return redirect()->route('admin.caracteristicas.index');
    }

    public function show(Caracteristica $caracteristica)
    {
        abort_unless(\Gate::allows('caracteristica_show'), 403);
        $caracteristica->load('user');
        return view('admin.caracteristicas.show', compact('Caracteristica'));
    }

    public function destroy(Caracteristica $caracteristica)
    {
        abort_unless(\Gate::allows('caracteristica_delete'), 403);
        $caracteristica->delete();
        return back();
    }

    public function massDestroy(MassDestroyCaracteristicaRequest $request)
    {
        Caracteristica::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
