<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

     Route::post('change-password', 'ChangePasswordController@changePassword')->name('auth.change_password');
     
     Route::get('reports', 'ReportController@index')->name('reports.index');

    Route::get('user-actions', 'UserActionController@index')->name('user-actions.index');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');

    Route::resource('products', 'ProductsController');

	Route::delete('clientes/destroy', 'ClienteController@massDestroy')->name('clientes.massDestroy');

    Route::resource('clientes', 'ClienteController');
	
	 Route::delete('dependencias/destroy', 'DependenciaController@massDestroy')->name('dependencias.massDestroy');

	 Route::resource('dependencias', 'DependenciaController');
    
   	 Route::delete('perifericos/destroy', 'PerifericoController@massDestroy')->name('perifericos.massDestroy');

   	 Route::resource('perifericos', 'PerifericoController');
    
     Route::delete('caracteristicas/destroy', 'CaracteristicaController@massDestroy')->name('caracteristicas.massDestroy');

     Route::resource('caracteristicas', 'CaracteristicaController');
    
     Route::delete('equipos/destroy', 'EquipoController@massDestroy')->name('equipos.massDestroy');

     Route::resource('equipos', 'EquipoController');
    
     Route::delete('tipos/destroy', 'TipoController@massDestroy')->name('tipos.massDestroy');

     Route::resource('tipos', 'TipoController');
    
     Route::delete('softwares/destroy', 'SoftwareController@massDestroy')->name('softwares.massDestroy');

     Route::resource('softwares', 'SoftwareController');
    
    Route::delete('edificios/destroy', 'EdificioController@massDestroy')->name('edificios.massDestroy');

    Route::resource('edificios', 'EdificioController');
    
     Route::delete('tickets/destroy', 'TicketController@massDestroy')->name('tickets.massDestroy');

     Route::resource('tickets', 'TicketController');
     
   
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
