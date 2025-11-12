@extends('layouts.app')

@section('title', 'Ficha')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2>Lista de Ficha</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('Ficha.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nueva Ficha
            </a>
        </div>
    </div>
    
   <!-- Mensajes de éxito/error -->
   @if(session('success'))
   <div class="alert alert-success alert-dismissible fade show" role="alert">
       {{ session('success') }}
       <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
   </div>
@endif

@if(session('error'))
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
       {{ session('error') }}
       <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
   </div>
@endif

<!-- Tabla de fichas -->
<div class="card">
    <div class="card-body">
        @if(isset($ficha) && $ficha->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Numero de recibo</th>
                            <th>Fecha de registro</th>
                            <th>Nombre del instituto</th>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Nombre del aspirante</th>
                            <th>Nip</th>
                            <th>Fecha de nacimiento</th>
                            <th>Nacionalidad</th>
                            <th>Curp</th>
                            <th>Entidad federativa prepa</th>
                            <th>Acciones</th>
                        </tr> 
                    </thead>
                    <tbody>
                        @foreach($ficha as $item)
                        <tr>
                            <td>{{ $item->no_recibo }} </td>
                            <td>{{ $item->fecha_registro->format('d/m/Y') }}</td>
                            <td>{{ $item->instituto }}</td>
                            <td>{{ $item->apellido_paterno }}</td>
                            <td>{{ $item->apellido_materno }}</td>
                            <td>{{ $item->nombre_aspirante }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->fecha_nacimiento->format('d/m/Y') }}</td>
                            <td>{{ $item->nacionalidad }}</td>
                            <td>{{ $item->curp }}</td>
                            <td>{{ $item->entidad_federativa_prepa }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('Ficha.show', $item->no_recibo) }}" 
                                        class="btn btn-sm btn-info"
                                        title="Ver detalle">
                                        <i class="bi bi-eye"></i> Ver
                                    </a>


                                        <a href="{{ route('Ficha.edit', $item->no_recibo) }}" 
                                            class="btn btn-sm btn-warning"
                                            title="Editar">
                                            <i class="bi bi-pencil"></i> Editar
                                        </a>


                                    <form action="{{ route('Ficha.destroy', $item->no_recibo) }}" 
                                        method="POST" 
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                        class="btn btn-sm btn-danger"
                                        title="Eliminar"
                                        onclick="return confirm('¿Está seguro de eliminar esta ficha {{$item->no_recibo}}?')">
                                        
                                        <i class="bi bi-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> No hay fichas registradas.
                <a href="{{ route('Ficha.create') }}">Crear la primera</a>
            </div>
        @endif
    </div>
</div>
</div>
@endsection


                