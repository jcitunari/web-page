@extends('app')
@section('tittle', 'Color | JCI Tunari')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center pt-20">Actualizar colores</h3>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-5 col-12">
                <form  action="{{ route('color.update') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <input type="color" name="firstColor" value="{{ $colorActual->firstColor }}">
                            </div>
                        </div>
                        <input type="text" class="form-control shadow-none" placeholder="Color primario" disabled>
                      </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <input type="color" name="secondColor" value="{{ $colorActual->secondColor }}">
                            </div>
                        </div>
                        <input type="text" class="form-control shadow-none" placeholder="Color secundario" disabled>
                      </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <input type="color" name="thirdColor" value="{{ $colorActual->thirdColor }}">
                            </div>
                        </div>
                        <input type="text" class="form-control shadow-none" placeholder="Color terciario" disabled>
                      </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <input type="color" name="footerColor" value="{{ $colorActual->footerColor }}">
                            </div>
                        </div>
                        <input type="text" class="form-control shadow-none" placeholder="Color pie de página" disabled>
                      </div>
                  </div>
            
                  <div class="col-md-6 col-6 d-grid gap-2 pt-20 pb-50">
                    <button type="submit" class="btn btn-second">Actualizar</button>
                  </div>
                  <div class="col-md-6 col-6 d-grid gap-2 pt-20 pb-50">
                    <a class="btn btn-first" href="{{ route('inicio') }}">Cancelar</a>
                  </div>
                </form>
            
            </div>
          </div>
    </div>
</div>
@endsection