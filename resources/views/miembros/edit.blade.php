@extends('app')
@section('tittle', 'Editar Miembro | JCI Tunari')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center pt-20">Edición de miembro</h3>
        </div>
        <div class="col-md-8 centro">
            <form  action="{{ route('miembros.update', [$miembro, $ultimoCargo]) }}" method="POST" class="row g-3" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="col-md-4">
                <label for="nombre" class="form-label">Nombres</label>
                <input type="text" class="form-control shadow-none" id="nombre" name="nombre" value="{{ $miembro->nombre }}" disabled>
                @error('nombre')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="apPaterno" class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control shadow-none" id="apPaterno" name="apPaterno" value="{{ $miembro->apPaterno }}" disabled>
                @error('apPaterno')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="apeMaterno" class="form-label">Apellido Materno</label>
                <input type="text" class="form-control shadow-none" id="apMaterno" name="apMaterno" value="{{ $miembro->apMaterno }}" disabled>
                @error('apMaterno')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="ci" class="form-label">Cédula de Identidad</label>
                <input type="text" class="form-control shadow-none" id="ci" name="ci" value="{{ $miembro->ci }}" disabled>
                @error('ci')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control shadow-none" id="fechaNacimiento" name="fechaNacimiento" value="{{ $miembro->fechaNacimiento }}" disabled>
                @error('fechaNacimiento')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
                </div>
                <div class="col-md-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control shadow-none" id="email" name="email" value="{{ $miembro->email }}">
                    @error('email')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="celular" class="form-label">Nro. de Celular</label>
                    <input type="text" class="form-control shadow-none" id="celular" name="celular" value="{{ $miembro->celular }}">
                    @error('celular')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="profesion" class="form-label">Profesión</label>
                    <input type="text" class="form-control shadow-none" id="profesion" name="profesion" value="{{ $miembro->profesion }}">
                    @error('profesion')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label for="intereses" class="form-label">Habilidades</label>
                    <input type="text" class="form-control shadow-none" id="intereses" name="intereses" value="{{ $miembro->intereses }}">
                    @error('intereses')
                        <small class="text-danger" role="alert">
                            {{ $message }}
                        </small>
                    @enderror
                  </div>
              <div class="col-md-4">
                <label for="fechaJuramento" class="form-label">Fecha de Juramento</label>
                <input type="date" class="form-control shadow-none" id="fechaJuramento" name="fechaJuramento" value="{{ $miembro->fechaJuramento }}" disabled>
                @error('fechaJuramento')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="cargo" class="form-label">Ultimo cargo ocupado</label>
                <select id="cargo" class="form-select shadow-none" name="cargo" value="{{ $ultimoCargo->cargo_id }}">
                  <option value="" selected>Seleccionar...</option>
                  @foreach ($cargos as $cargo)
                    <option value="{{ $cargo->id }}"
                        {{ $ultimoCargo->cargo_id == $cargo->id ? 'selected' : '' }}
                    >{{ $cargo->nombre }}</option>
                  @endforeach
                </select>
                @error('cargo')
                    <small class="text-danger" role="alert">
                        Seleccione un Cargo
                    </small>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="gestion" class="form-label">En la gestión</label>
                <select id="gestion" class="form-select shadow-none" name="gestion" value="{{ $ultimoCargo->gestion_id }}">
                  <option value="" selected>Seleccionar...</option>
                  @foreach ($gestiones as $gestion)
                    <option value="{{ $gestion->id }}"
                        {{ $ultimoCargo->gestion_id == $gestion->id ? 'selected' : '' }}
                    >{{ $gestion->anio }}</option>
                  @endforeach
                </select>
                @error('gestion')
                    <small class="text-danger" role="alert">
                        Seleccione una Gestión
                    </small>
                @enderror
              </div>
              <div class="col-md-12">
                <label for="presentacion" class="form-label">Presentación</label>
                <textarea class="form-control shadow-none" id="presentacion" name="presentacion" value="" rows="3">{{ $miembro->presentacion }}</textarea>
                @error('presentacion')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              <!--    -->
              <div class="col-md-4">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><img src="{{ url('/') }}/images/iconos/facebook.png" alt="fb" width="25px"></div>
                    </div>
                    <input type="text" class="form-control shadow-none" id="facebook" name="facebook" value="{{ $miembro->facebook }}" placeholder="Facebook link">
                        @error('facebook')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
                  </div>
              </div>
              <div class="col-md-4">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><img src="{{ url('/') }}/images/iconos/instagram.png" alt="ig" width="25px"></div>
                    </div>
                    <input type="text" class="form-control shadow-none" id="instagram" name="instagram" value="{{ $miembro->instagram }}" placeholder="Instagram link">
                        @error('instagram')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
                  </div>
              </div>
              <div class="col-md-4">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><img src="{{ url('/') }}/images/iconos/linkedin.png" alt="ln" width="25px"></div>
                    </div>
                    <input type="text" class="form-control shadow-none" id="linkedin" name="linkedin" value="{{ $miembro->linkedin }}" placeholder="Linkedin link">
                        @error('linkedin')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
                  </div>
              </div>
              <div class="col-md-4">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><img src="{{ url('/') }}/images/iconos/twitter.png" alt="ln" width="25px"></div>
                    </div>
                    <input type="text" class="form-control shadow-none" id="twitter" name="twitter" value="{{ $miembro->twitter }}" placeholder="Twitter link">
                        @error('twitter')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
                  </div>
              </div>
              <div class="col-md-4">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><img src="{{ url('/') }}/images/iconos/tiktok.png" alt="ln" width="25px"></div>
                    </div>
                    <input type="text" class="form-control shadow-none" id="tiktok" name="tiktok" value="{{ $miembro->tiktok }}" placeholder="Tiktok link">
                        @error('tiktok')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
                  </div>
              </div>
              <div class="col-md-4">
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><img src="{{ url('/') }}/images/iconos/web.png" alt="ln" width="25px"></div>
                    </div>
                    <input type="text" class="form-control shadow-none" id="web" name="web" value="{{ $miembro->web }}" placeholder="Web link">
                        @error('web')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
                  </div>
              </div>
              <!--    -->
              <div class="col-md-5">
                <label for="img" class="form-label">Actualizar foto</label>
                <input type="file" class="form-control shadow-none" id="img" name="img" value="{{ old('img') }}">
                @error('img')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              <div class="col-md-5">
                <label for="cv" class="form-label">Actualizar curriculum</label>
                <input type="file" class="form-control shadow-none" id="cv" name="cv" value="{{ old('cv') }}">
                @error('cv')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              <div class="col-md-6 col-6 d-grid gap-2 pt-20 pb-50">
                <button type="submit" id="submit" class="btn btn-second" onclick="executeProcess()">Actualizar</button>
              </div>
              <div class="col-md-6 col-6 d-grid gap-2 pt-20 pb-50">
                <a class="btn btn-first" href="{{ route('miembros.show', $miembro->id) }}">Cancelar</a>
              </div>
            </form>

        </div>
    </div>
</div>
@endsection