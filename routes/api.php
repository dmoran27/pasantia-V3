<?php

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('products', 'ProductsApiController');
    
    Route::apiResource('rules', 'RulesApiController', ['only' => ['index']]);

    Route::apiResource('clientes', 'ClientesApiController');
	
	Route::apiResource('dependencias', 'DependenciasApiController');
    
   	Route::apiResource('perifericos', 'PerifericosApiController');
    
    Route::apiResource('caracteristicas', 'CaracteristicasApiController');
    
    Route::apiResource('equipos', 'EquiposApiController');
    
    Route::apiResource('tipos', 'TiposApiController');
    
    Route::apiResource('softwares', 'SoftwaresApiController');
    
    Route::apiResource('areas', 'AreasApiController');
    
    Route::apiResource('edificios', 'EdificiosApiController');
    
    Route::apiResource('tickets', 'TicketsApiController');
    
    Route::apiResource('roles', 'RolesApiController');
    
    Route::apiResource('users', 'UsersApiController');

    Route::get('reports', 'ReportsApiController@index');
    
    Route::get('user-actions', 'UserActionsApiController@index');
        });
