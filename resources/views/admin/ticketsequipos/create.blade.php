

@extends('layouts.admin')
@section('content')

@include('admin.tickets.create')

 <div class="row">
			<div class="col-12">
				<h5 class="text-center mb-5">DATOS DEL EQUIPO.</h5>
			</div>
		</div>
		 <div id='type'>
                <label for="radio_1">Crear equipo</label>
                <input type='radio' id='radio_cequipo' name='type' value='1' />
                <label for="radio_1">Agregar equipo</label>
                <input type='radio' id='radio_aequipo' name='type' value='2' />
                
        </div> 
        <div class="row">
            <div class="form-group {{ $errors->has('cliente')}} col-12 d-none" id="aggEquipo">
                <label for="cliente" class=" col-form-label text-md-right">Equipo:*</label>
                <div class="">   
                 
                    <select class="form-control{{ $errors->has('cliente') ? ' is-invalid' : '' }} " name="cliente_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         
                      
                      </select>
                    
                </div>
            </div>
        </div>

        <div class="cliente row d-none" id="crearEquipo">
			<div class="row">
             
            <div class="form-group {{ $errors->has('identificador') ? 'has-error' : '' }} col-12 col-md-6">
                <label for="identificador2">Identificador:*</label>
                <input type="text" id="identificador" name="identificador" class="form-control" value="{{ old('identificador') }}">
                              
            </div> 
             <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }} col-12 col-md-6">
                <label for="nombre2">Nombre:*</label>
                <input type="text" id="nombre2" name="nombre" class="form-control" value="{{ old('nombre') }}">
                             
            </div> 
             <div class="form-group {{ $errors->has('marca') ? 'has-error' : '' }} col-12 col-md-4">
                <label for="marca2">Marca:*</label>
                <input type="text" id="marca2" name="marca" class="form-control" value="{{ old('marca') }}">
           
            </div> 
             <div class="form-group {{ $errors->has('modelo') ? 'has-error' : '' }} col-12 col-md-4">
                <label for="modelo2">Modelo:*</label>
                <input type="text" id="modelo2" name="modelo" class="form-control" value="{{ old('modelo') }}">
            </div> 
             <div class="form-group {{ $errors->has('serial') ? 'has-error' : '' }} col-12 col-md-4">
                <label for="serial2">Serial:*</label>
                <input type="text" id="serial2" name="serial" class="form-control" value="{{ old('serial') }}">
              
            </div> 
            <div class="form-group {{ $errors->has('tipo')}} col-12">
                <label for="tipo" class=" col-form-label text-md-right">Tipo:*</label>
                <div class="">   
                 
                    <select class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }} " name="tipo_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                       
                      </select>
                    
                </div>
            </div> 
            <div class="form-group {{ $errors->has('softwares') ? 'has-error' : '' }} col-12">
                <label for="softwares" class="w-100">Softwares del equipo
                    <span class="btn btn-info btn-xs select-all">Seleccionar todo</span>
                    <span class="btn btn-info btn-xs deselect-all">Quitar todo</span></label>
                <select name="softwares[]" id="softwares" class="form-control w-100 select2" multiple="multiple">
                   
                </select>
               
            </div>
             <div class="form-group {{ $errors->has('perifericos') ? 'has-error' : '' }} col-12">
                <label for="perifericos" class="w-100">Perifericos del equipo
                    <span class="btn btn-info btn-xs select-all">Seleccionar todo</span>
                    <span class="btn btn-info btn-xs deselect-all">Quitar todo</span></label>
                <select name="perifericos[]" id="perifericos" class="form-control w-100 select2" multiple="multiple">
                   
                </select>
               
            </div>
            <div class="form-group {{ $errors->has('perteneciente')}} col-12 col-md-6">
                <label for="perteneciente" class=" col-form-label text-md-right">Pertenece a la UNEXPO?*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('perteneciente') ? ' is-invalid' : '' }}" name="perteneciente" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    
                      </select>
                </div>
            </div>
            <div class="form-group {{ $errors->has('estado')}} col-12 col-md-6">
                <label for="estado" class=" col-form-label text-md-right">Estado del equipo:*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        
                      </select>
                </div>
            </div>
            <div class="form-group {{ $errors->has('observacion') ? 'has-error' : '' }} col-12">
                <label for="observacion">Observación:*</label>
                <input type="text" id="observacion" name="observacion" class="form-control" value="{{ old('observacion') }}">
                               
            </div>               
        </div>
           
          <div  id="caracteristicas" class="d-none" >
                    </div>
          
        <div class="table-responsive row">
             <h5 class="text-center my-5 col-12">CARACTERISTICAS DEL EQUIPO:</h5>
            <table class=" table table-bordered table-striped table-hover  col-12" id='userTable'>
                <thead>
                    <tr> 
                                              
                         <th width="10">
                            #
                        </th>
                        
                        <th>
                            Nombre
                        </th>
                          <th>
                           Atributo
                        </th>
                       
                        <th>
                            Acciones
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody  value=2>                   
                        <tr data-entry-id=" ">
                            <td>
                           
                             </td>
                            
                            <td>
                                <input type='text'  class="nombre w-100" id='nombre' placeholder="Marca, Modelo, color, puerto, ...">
                            </td>
                            <td>
                                <input type='text' class="propiedad w-100" id='propiedad' placeholder="Azul, 2, ...">
                            </td>
                            <td>
                                <input type='button' id="add" value='Agregar' class="btn btn-xs w-100 btn-success">
                                
                            </td>
                            
                        </tr>
                  
                </tbody>
            </table>
        </div>         
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
       


        </div>
    </div>
</div>
 <script type="text/javascript">
$(document).ready(function () {                               

    $('#add').click(function(){
        var nombre = $("#nombre").val();
        var propiedad = $('#propiedad').val();
        if(nombre != '' && propiedad != '' ){             
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},    
                url: '{{ route("admin.caracteristicas.store") }}',
                type: 'POST',
                data: {nombre:nombre, propiedad:propiedad},
                
            }).done(function(data){
                if(data > 0){
                    swal("Felicidades!", "Elemento Agregado correctamente!", "success");
                    var id = data;
                    var findnorecord = $('#userTable tr.norecord').length;
                    if(findnorecord > 0){
                      $('#userTable tr.norecord').remove();
                    }
                      var tr_str = "<tr data-entry-id='"+id+"'><td><input type='hidden' value="+id+"  /></td><td><input type='text'  class='nombre  d-none w-100' id='nombre-"+id+"' value="+nombre+" placeholder='Marca, Modelo, color, puerto, ...''><p class=''>"+nombre+"</p></td><td><input type='text'  class='propiedad  d-none w-100' id='propiedad-"+id+"' value='"+propiedad+"' placeholder='Marca, Modelo, color, puerto, ...'><p class=''>"+propiedad+"</p></td><td><!--input type='button' value='Editar' class='update btn btn-xs w-100 btn-info' data-id='"+id+"' --><input type='button' class='btn btn-xs w-100 btn-danger delete' value='Eliminar  ' data-id='"+id+"' ></td>"+
                    "</tr>";
                    $("#userTable tbody").append(tr_str);
                    var option="<input name='caracteristicas[]' value="+id+" id='input-"+id+"' />";
                    $("#caracteristicas").append(option);    
                    
                  }else if(data == 0){
                    swal("UPS!", "Error en el servidor!", "danger");
                    alert('Error.');
                  }else{
                    alert(data);
                  }
                  // Empty the input fields
                  $('#nombre').val('');
                  $('#propiedad').val('');
             
             }).fail(function(x,xs,xt){
                  //nos dara el error si es que hay alguno
                 // window.open(JSON.stringify(x));
                alert('error: ' + x+"\n error string: "+ xs + "\n error throwed: " + xt);
            });
        }else{
            alert(' falta datos');
        }
      

    });
     $(document).on("click", ".delete" , function() {
      var delete_id = $(this).data('id');
      var el = this;
    swal({
      title: "Esta Seguro de Eliminar este elemento?",
      text: "Una vez eliminado no podra recuperarlo!",
      icon: "warning",
      dangerMode: true,
      buttons: {
        cancel: {
            text: "Cancelar",
            visible:true
        },
        confirm: {
            text: "Si"
        }
        }
      }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                url: '{{URL::to("/admin/caracteristicas/")}}/'+ delete_id,
                type: 'delete'
            })
                .done( function(response){
                    swal("Felicidades!", "Elemento Eliminado correctamente!", "success");
                    $(el).closest( "tr" ).remove();
                    $('#caracteristicas #input-'+delete_id).remove();
                
                 });
        } 
    });
});
});

 </script>




@endsection