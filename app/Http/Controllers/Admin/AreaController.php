<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyAreaRequest;
use App\Http\Requests\Admin\StoreAreasRequest;
use App\Http\Requests\Admin\UpdateAreasRequest;
use App\Area;

class AreaController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('area_access'), 403);
        $areas = Area::all();
        return view('admin.areas.index', compact('areas'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('area_create'), 403);
        return view('admin.areas.create');
    }

    public function store(StoreAreasRequest $request)
    {
        abort_unless(\Gate::allows('area_create'), 403);
        $area = Area::create($request->all());
        return redirect()->route('admin.areas.index');
    }

    public function edit(Area $area)
    {
        abort_unless(\Gate::allows('area_edit'), 403);
        return view('admin.areas.edit', compact('areas'));
    }

    public function update(UpdateAreasRequest $request, Area $area)
    {
        abort_unless(\Gate::allows('area_edit'), 403);
        $area->update($request->all());
        return redirect()->route('admin.areas.index');
    }

    public function show(Area $area)
    {
        abort_unless(\Gate::allows('area_show'), 403);
        return view('admin.areas.show', compact('area'));
    }

    public function destroy(Area $area)
    {
        abort_unless(\Gate::allows('area_delete'), 403);
        $area->delete();
        return back();
    }

    public function massDestroy(MassDestroyAreaRequest $request)
    {
        Area::whereIn('id', request('ids'))->delete();
        return response(null, 204);
    }
}
