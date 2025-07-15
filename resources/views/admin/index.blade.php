@extends('app')
@section('tittle', 'Usuarios | JCI Tunari')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center pt-20">Roles y permisos</h3>
        </div>
        <div class="col-md-10 centro">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" data-bs-dismiss="alert">
                {{ session('success') }}
            </div>
        @endif
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col" class="col-md-1">ID</th>
                    <th scope="col" class="col-md-4">Nombres y apellidos</th>
                    <th scope="col" class="col-md-2">Rol actual</th>
                    <th scope="col" class="col-md-5">Actualizar rol</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <th scope="row">{{ $usuario->id}}</th>
                        <td>{{ $usuario->nombre }} {{$usuario->apPaterno}} {{$usuario->apMaterno }}</td>
                        <td>{{$usuario->rol}}</td>
                        <td>
                            <form action="{{ route('admin.update', [$usuario->id]) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="rol" name="rol" value="USUARIO">
                                <button type="submit" class="btn btn-rol-usuario">USUARIO</button> 
                            </form>
                            <form action="{{ route('admin.update', [$usuario->id]) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="rol" name="rol" value="EDITOR">
                                <button type="submit" class="btn btn-rol-editor">EDITOR</button> 
                            </form>
                            <form action="{{ route('admin.update', [$usuario->id]) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="rol" name="rol" value="ADMIN">
                                <button type="submit" class="btn btn-rol-administrador">ADMINISTRADOR</button> 
                            </form>
                            <form action="{{ route('admin.update', [$usuario->id]) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="rol" name="rol" value="INACTIVO">
                                <button type="submit" class="btn btn-rol-inactivo">INACTIVO</button>
                            </form>
                            <a class="btn btn-rol-update" href="{{ route('miembros.edit', $usuario->id) }}"><img src="{{ url('/') }}/images/iconos/editar.png" alt="conf" width="20px"></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              {{ $usuarios->links() }}
        </div>
    </div>
</div>
@endsection