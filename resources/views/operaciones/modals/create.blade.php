<!-- Modal -->
<div class="modal animated zoomIn" id="createMdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-inspinia text-primary" id="exampleModalLabel">Nuevo Operación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <form action="{{route('Operacion/buscar')}}" method="get">
                    <div class=" col-lg-12 form-row">
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="texto" value="{{'texto'}}">
                          </div>
                          <div class="col-sm-4">
                              <input type="submit" class="btn btn-primary" value="Buscar">
                              </div>   
                      </div>     
                </form>  --}}
                <form action="{{ route('operaciones.store') }}" role="form" method="POST"
                    enctype="multipart/form-data" id="createCargotFrm">
                    {{ csrf_field() }}

                    <div class="row">
                        
                            <div class=" col-lg-6 form-group">
                                <label class="text-sm" for="equipo_id">Equipo</label>
                                <select class="form-control" name="equipo_id">
                                    <option value="">Seleecione</option>
                                    @foreach ($equipos as $equipo)
                                        <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('equipo_id')
                                <span class="error-message text-danger">{{ $message }}</span>
                            @enderror   
                            </div>
                            <div>
                                <label for="responsable" class="form-fields">Responsable</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('responsable') ? 'is-invalid' : '' }}"
                                    name="responsable" id="responsable" value="{{ old('responsable') }}">
                                @if ($errors->has('responsable'))
                                    <span class="text-danger">{{ $errors->first('responsable') }}</span>
                                @endif
                            </div>
                        
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="celular" class="form-fields">celular</label>
                                <label class="mandatory-field">*</label>
                                <input type="text" class="form-control {{ $errors->has('celular') ? 'is-invalid' : '' }}"
                                    name="celular" id="celular" value="{{ old('celular') }}">
                                @if ($errors->has('celular'))
                                    <span class="text-danger">{{ $errors->first('celular') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <label for="fecha_devolucion" class="form-fields">Fecha de Devolucion</label>
                            <label class="mandatory-field">*</label>

                            <input type="datetime-local"
                                class="form-control {{ $errors->has('fecha_devolucion') ? 'is-invalid' : '' }}"
                                name="fecha_devolucion" id="fecha_devolucion" value="{{ old('fecha_devolucion') }}">
                            @if ($errors->has('fecha_devolucion'))
                                <span class="text-danger">{{ $errors->first('fecha_devolucion') }}</span>
                            @endif
                        </div>
                        <div class="col-lg-6 form-group">
                            <div>
                                <label for="descripcion" class="form-fields">descripcion</label>
                                <label class="mandatory-field">*</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}"
                                    name="descripcion" id="descripcion" value="{{ old('descripcion') }}">
                                @if ($errors->has('descripcion'))
                                    <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                                @endif
                            </div>
                        </div>
                   
                        <div class=" col-lg-6 form-group">
                            <label class="text-sm" for="area_id">Area</label>
                            <select class="form-control" name="area_id">
                                <option value="">Seleecione</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class=" col-lg-6 form-group">
                            <label class="text-sm" for="estado_id">Estado</label>
                            <select class="form-control" name="estado_id">
                                <option value="">Seleecione</option>
                                @foreach ($estados as $estado)
                                <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class=" col-lg-6 form-group">
                            <label class="text-sm" for="toperacion_id">Tipo de operacion</label>
                            <select class="form-control" name="toperacion_id">
                                <option value="">Seleecione</option>
                                @foreach ($toperaciones as $toperacion)
                                <option value="{{ $toperacion->id }}">{{ $toperacion->nombre }}</option>
                            @endforeach
                            </select>
                        </div>

                    </div>


                    <div class="buttons-form-submit d-flex justify-content-end">
                        <button type="reset" class="btn btn-secondary mr-1" data-dismiss="modal">Cerrar</button>
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
