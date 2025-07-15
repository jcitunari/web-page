@extends('app')
@section('tittle', 'Cargo | JCI Tunari')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center pt-20">Crear nueva dirección</h3>
        </div>
        <div class="col-md-8 centro">
            <form  action="{{ route('cargo.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
              @csrf
              <div class="col-md-8">
                <label for="nombre" class="form-label">Nombre de Dirección</label>
                <input type="text" class="form-control shadow-none" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Ej: DIR. DE MIEMBRO INDIVIDUAL">
                @error('nombre')
                    <small class="text-danger" role="alert">
                        {{ $message }}
                    </small>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" class="form-control shadow-none" id="tipo" name="tipo" value="JUNTA DIRECTIVA LOCAL" disabled>
                @error('tipo')
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
@endsection