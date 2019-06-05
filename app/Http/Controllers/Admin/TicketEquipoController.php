<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\General;
use App\User;
use App\Caracteristica;
use App\Ticket;
use App\General;
use App\Cliente;
use App\Dependencia;


use App\TicketEquipo;

class TicketEquipoController extends Controller{ 

    public function index(){ 
         return view('admin.ticketsequipos.index');
}
     public function show(TicketEquipo $ticketEquipo){
           return view('admin.ticketsequipos.views');
    }

    public function create(){

        $tipos = Tipo::all()->where('tipo', 'TicketEquipo');
        $enumoption = General::getEnumValues('tickets','accion'); 
        $enumoption2 = General::getEnumValues('tickets','estado');  
        $enumoption3 = General::getEnumValues('tickets','prioridad');
        $enumoption4 = General::getEnumValues('tickets','traslado_servicio');
        $enumoption5 = General::getEnumValues('tickets','traslado_ticket');
        $enumoption6 = General::getEnumValues('tickets','estado');
        $enumoption2 = General::getEnumValues('tickets','estado');
        $enumoption2 = General::getEnumValues('tickets','estado');
        $enumoption2 = General::getEnumValues('clientes','sexo');
        $enumoption2 = General::getEnumValues('clientes','tipo');

      return view('admin.ticketsequipos.create');
    }

    public function store(Request $request){
       
    }

    public function edit(TicketEquipo $ticketEquipo){
        
    }

    public function update(Request $request, TicketEquipo $ticketEquipo){
        
    }

   

    public function destroy(TicketEquipo $ticketEquipo){
      
    }

    public function massDestroy(Request $request){
       
    }
}
