<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyUserRequest;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use App\General;
use App\Role;
use App\User;
use App\Area;

class UsersController extends Controller
{

    $users = User::all();
    $roles = Role::all()->pluck('title', 'id');
    $areas = Area::all()->pluck('nombre', 'id');
    $enumoption = General::getEnumValues('users','sexo');
    $user->load('roles','areas');

    public function index(){
        
        abort_unless(\Gate::allows('user_access'), 403);//Comparar si tiene permisos
        return view('admin.users.index', compact('users'));
    }

     public function show(User $user){
        abort_unless(\Gate::allows('user_show'), 403);
        return view('admin.users.show', compact('user'));
    }
    public function create(){
        abort_unless(\Gate::allows('user_create'), 403);
        return view('admin.users.create', compact('roles', 'enumoption', 'areas'));
    }

    public function store(StoreUsersRequest $request){
        abort_unless(\Gate::allows('user_create'), 403);
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));
        $notificacion = array(
            'message' => 'Usuario creado con exito.', 
            'alert-type' => 'success'
        );
        return view('admin.users.index', compact('users', 'notificacion'));
    }

    public function edit(User $user){
        abort_unless(\Gate::allows('user_edit'), 403);      
        return view('admin.users.edit', compact('roles','enumoption', 'areas', 'user'));
    }

    public function update(UpdateUsersRequest $request, User $user){
        abort_unless(\Gate::allows('user_edit'), 403);
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        $notificacion = array(
            'message' => 'Usuario creado con exito.', 
            'alert-type' => 'success'
        );
        return view('admin.users.index', compact('users', 'notificacion'));
    }

   

    public function destroy(User $user){
        abort_unless(\Gate::allows('user_delete'), 403);
        $user->delete();       
        $notificacion = array(
            'message' => 'Usuario eliminado con exito.', 
            'alert-type' => 'Danger'
        );
        return redirect()->back()->with($notificacion);
    }

    public function massDestroy(MassDestroyUserRequest $request){
        User::whereIn('id', request('ids'))->delete();
        $notificacion = array(
            'message' => 'Usuarios Eliminados con exito.', 
            'alert-type' => 'Danger'
        );
        return redirect()->back()->with($notificacion);
    }
}
