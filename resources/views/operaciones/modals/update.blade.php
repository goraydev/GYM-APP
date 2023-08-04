<!-- Modal -->
<div class="modal animated zoomIn" id="editModal{{$operacion->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Actualizar operacion</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <form method="POST" action="{{route('operaciones.update', $operacion->id)}}" enctype="multipart/form-data">
                 @method('PUT')
                   {{csrf_field()}}
           
                      <div class="row">
                       <div class="col-lg-12 form-group">
                         <div>
                             <label for="responsable" class="form-fields">responsable</label>
                             <label class="mandatory-field">*</label>
                             <input type="text" value="{{$operacion->responsable}}"
                                    class="form-control {{$errors->has('responsable') && $errors->has('put')  ? 'is-invalid' : ''}}"
                                    name="responsable" id="responsable" value="{{old('responsable')}}">
                             @if($errors->has('responsable')&&$errors->has('put'))
                                 <span class="text-danger">{{$errors->first('responsable')}}</span>
                             @endif
                         </div>
                         
                       </div>
                       <div class="col-lg-6">
                        <label for="celular" class="form-fields">celular</label>
                        <input type="text" value="{{$operacion->celular}}"
                               class="form-control {{$errors->has('celular') && $errors->has('put') ? 'is-invalid' : ''}}"
                               name="celular" id="celular" value="{{old('celular')}}">
                        @if($errors->has('celular')&&$errors->has('put'))
                            <span class="text-danger">{{$errors->first('celular')}}</span>
                        @endif
                    </div>
                       <div class="col-lg-6">

                        <label for="fecha_devolucion" class="form-fields">Fecha de Devolucion</label>
                        <label class="mandatory-field">*</label>

                        <input type="date" value="{{$operacion->fecha_devolucion}}"
                            class="form-control {{ $errors->has('fecha_devolucion')&&$errors->has('put') ? 'is-invalid' : '' }}"
                            name="fecha_devolucion" id="fecha_devolucion" value="{{ old('fecha_devolucion') }}">
                        @if ($errors->has('fecha_devolucion')&&$errors->has('put'))
                            <span class="text-danger">{{ $errors->first('fecha_devolucion') }}</span>
                        @endif
                    </div>
                       <div class="col-lg-12 form-group">
                        <div>
                            <label for="descripcion" class="form-fields">Descripcion</label>
                            <label class="mandatory-field">*</label>
                            <input type="text" value="{{$operacion->descripcion}}"
                                   class="form-control {{$errors->has('descripcion') && $errors->has('put')  ? 'is-invalid' : ''}}"
                                   name="descripcion" id="descripcion" value="{{old('descripcion')}}">
                            @if($errors->has('descripcion')&&$errors->has('put'))
                                <span class="text-danger">{{$errors->first('descripcion')}}</span>
                            @endif
                        </div>
                       
                      </div>
                    
                <div class=" col-lg-6 form-group">
                    <label class="text-sm" for="area_id">Area</label>
                    <select class="form-control" name="area_id">
                        @foreach ($areas as $area)
                        @if (($operacion->area_id) == $area->id)
                        <option value="{{$area->id}}" selected>{{$area->nombre}}</option>
                        @else
                        <option value="{{$area->id}}">{{$area->nombre}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class=" col-lg-6 form-group">
                    <label class="text-sm" for="estado_id">Estado</label>
                    <select class="form-control" name="estado_id">
                        @foreach ($estados as $estado)
                        @if (($operacion->estado_id) == $estado->id)
                        <option value="{{$estado->id}}" selected>{{$estado->nombre}}</option>
                        @else
                        <option value="{{$estado->id}}">{{$estado->nombre}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class=" col-lg-6 form-group">
                    <label class="text-sm" for="toperacion_id">Tipo de Operacion</label>
                    <select class="form-control" name="toperacion_id">
                        @foreach ($toperaciones as $toperacion)
                        @if (($operacion->toperacion_id) == $toperacion->id)
                        <option value="{{$toperacion->id}}" selected>{{$toperacion->nombre}}</option>
                        @else
                        <option value="{{$toperacion->id}}">{{$toperacion->nombre}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
             
                <div class=" col-lg-6 form-group">
                    @foreach ($equipos as $equipo)
                        @if (($operacion->equipo_id) == $equipo->id)

                        <input type="hidden" value="{{$equipo->id}}"
                                   class="form-control"
                                   name="equipo_id" id="equipo_id">

                        @else
                      
                        @endif
                        @endforeach
                </div>
                
            </div>                 

                   <div class="buttons-form-submit d-flex justify-content-end">
                       <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cerrar</button>
                       <button type="submit" href="#" class="btn btn-primary">
                           Guardar
                           <i class="fas fa-spinner fa-spin d-none"></i>
                       </button>
                   </div>

               </form>
           </div>
       </div>
   </div>
</div>
