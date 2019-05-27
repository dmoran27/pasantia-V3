<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MassDestroyUserRequest;
use App\Http\Requests\Admin\StoreUsersRequest;
use Illuminate\Support\Facades\Validator;
use App\General;
use App\Role;
use App\User;
use App\Area;

class UsersController extends Controller{ 

    public function index(){        
        abort_unless(\Gate::allows('user_access'), 403);//Comparar si tiene permisos
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

     public function show(User $user){
        abort_unless(\Gate::allows('user_show'), 403);
        return view('admin.users.show', compact('user'));
    }

    public function create(){
        $roles = Role::all()->pluck('title', 'id');
        $areas = Area::all();
        $enumoption = General::getEnumValues('users','sexo');       
        abort_unless(\Gate::allows('user_create'), 403);
        return view('admin.users.create', compact('roles', 'enumoption', 'areas'));
    }

    public function store(Request $request){    
       abort_unless(\Gate::allows('user_create'), 403);
        $validator = Validator::make($request->all(), [
            'email' => 'email|max:191|required|unique:users,email',
            'password' => 'required|string|min:6',
            'role.*' => 'integer|exists:roles,id|max:4294967295|required',
            'remember_token' => 'max:191|nullable',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cedula' => 'required|string|unique:users|max:10',
            'telefono' => 'required|string|max:50',
            'sexo' => 'required',
            'area_id' => 'required|exists:areas,id',

        ]);
        if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.users.create')
                        ->withErrors($validator)
                        ->withInput();
            }
        
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));
        $user->load('roles');
        $users = User::all();
        $notificacion = array(
            'message' => 'Usuario creado con exito.', 
            'alert-type' => 'success'
        );

        return view('admin.users.index', compact('users', 'notificacion'));
    }

    public function edit(User $user){
        $roles = Role::all()->pluck('title', 'id');
        $areas = Area::all();
        $enumoption = General::getEnumValues('users','sexo');
        $user->load('roles');
        abort_unless(\Gate::allows('user_edit'), 403);      
        return view('admin.users.edit', compact('roles','enumoption', 'areas', 'user'));
    }

    public function update(Request $request, User $user){

        abort_unless(\Gate::allows('user_edit'), 403);
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cedula' => 'required|string|max:10|unique:users,cedula,' .$user->id,
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'password' => '',
            'role.*' => 'integer|exists:roles,id|max:4294967295|required',
            'remember_token' => 'max:191|nullable',
            'telefono' => 'required|string|max:50',
            'sexo' => 'required',
            'area_id' => 'required|exists:areas,id',

        ]);

         if ($validator->fails()) {
            
           return redirect()
                        ->route('admin.users.edit', $user)
                        ->withErrors($validator)
                        ->withInput();
            }
      
         User::findOrFail($user->id)->update($request->all());
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        $user->load('roles');
               
        $users = User::all();
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
