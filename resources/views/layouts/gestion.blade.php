@extends('app')
@section('tittle', 'Gestion | JCI Tunari')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center pt-20">Crear nueva gestion</h3>
        </div>
        <div class="row justify-content-center align-items-center">
          <div class="col-md-6">
              <form  action="{{ route('gestion.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                  <label for="anio" class="form-label">Año</label>
                  <input type="text" class="form-control shadow-none" id="anio" name="anio" value="{{ old('anio') }}" placeholder="Ej: 2020">
                  @error('nombre')
                      <small class="text-danger" role="alert">
                          {{ $message }}
                      </small>
                  @enderror
                </div>
          
                <div class="col-md-6 col-6 d-grid gap-2 pt-20 pb-50">
                  <button type="submit" class="btn btn-second">Crear</button>
                </div>
                <div class="col-md-6 col-6 d-grid gap-2 pt-20 pb-50">
                  <a class="btn btn-first" href="{{ route('miembros.index') }}">Cancelar</a>
                </div>
              </form>
          
          </div>
        </div>
    </div>
</div>
@endsection