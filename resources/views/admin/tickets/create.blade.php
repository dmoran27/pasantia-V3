
        <div class="row">
            
            <div class="form-group {{ $errors->has('user')}} col-12">
                <label for="user" class=" col-form-label text-md-right">user:*</label>
                <div class="">   
                 
                    <select class="form-control{{ $errors->has('user') ? ' is-invalid' : '' }} " name="user_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->nombre}}</option>
                        @endforeach
                      
                      </select>
                    
                </div>
            </div> 
            <div class="form-group {{ $errors->has('perteneciente')}} col-12 col-md-6">
                <label for="perteneciente" class=" col-form-label text-md-right">Pertenece a la UNEXPO?*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('perteneciente') ? ' is-invalid' : '' }}" name="perteneciente" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption as $perteneciente)
                            <option value="{{$perteneciente}}">{{$perteneciente}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
            <div class="form-group {{ $errors->has('estado')}} col-12 col-md-6">
                <label for="estado" class=" col-form-label text-md-right">Estado del equipo:*</label>
                <div class="">   
                    <select class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado" style="width: 100%;" tabindex="-1" aria-hidden="true">
                         @foreach($enumoption2 as $estado)
                            <option value="{{$estado}}">{{$estado}}</option>
                        @endforeach
                      
                      </select>
                </div>
            </div>
            <div class="form-group {{ $errors->has('observacion') ? 'has-error' : '' }} col-12">
                <label for="observacion">Observación:*</label>
                <input type="text" id="observacion" name="observacion" class="form-control" value="{{ old('observacion') }}">
                @if($errors->has('observacion'))
                    <p class="help-block">
                        {{ $errors->first('observacion') }}
                    </p>
                @endif                
            </div>               
        </div>
 