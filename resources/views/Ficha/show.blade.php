@extends('layouts.app')

@section('title', 'Detalle de Ficha')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Detalle de Ficha</h4>   
                    <div>
                        <a href="{{ route('Ficha.edit', $ficha->no_recibo )}}"
                            class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <a href="{{ route('Ficha.index') }}"
                        class="btn btn-sm btn-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th width="30%" class="bg-light">Numero de recibo</th>
                                <td>{{ $ficha->no_recibo }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Fecha de pago</th>
                                <td>
                                    {{ $ficha->fecha_pago->format('d/m/Y') }}
                                    <small class="text-muted">({{ $ficha->fecha_pago->diffForHumans() }})</small>
                                </td>
                            </tr>
                            <tr>
                            <th class="bg-light">Fecha de registro</th>
                                <td>
                                    {{ $ficha->fecha_registro->format('d/m/Y') }}
                                    <small class="text-muted">({{ $ficha->fecha_registro->diffForHumans() }})</small>
                                </td>
                            </tr>
                            <tr>
                                <th width="30%" class="bg-light">Instituto</th>
                                <td>{{ $ficha->instituto }}</td>
                            </tr>
                            <tr>
                                <th width="30%" class="bg-light">Apellido paterno</th>
                                <td>{{ $ficha->apellido_paterno }}</td>
                            </tr> 
                            <tr>
                                <th width="30%" class="bg-light">Apellido materno</th>
                                <td>{{ $ficha->apellido_materno }}</td>
                            </tr>
                            <tr>
                                <th width="30%" class="bg-light">Nombre del aspirante</th>
                                <td>{{ $ficha->nombre_aspirante }}</td>
                            </tr>
                            <tr>
                                <th width="30%" class="bg-light">Nip</th>
                                <td>{{ $ficha->nip }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Fecha de nacimiento</th>
                                    <td>
                                        {{ $ficha->fecha_nacimiento->format('d/m/Y') }}
                                        <small class="text-muted">({{ $ficha->fecha_nacimiento->diffForHumans() }})</small>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="30%" class="bg-light">Sexo</th>
                                    <td>{{ $ficha->sexo }}</td>
                                </tr> 
                                <tr>
                                    <th width="30%" class="bg-light">Nacionalidad</th>
                                    <td>{{ $ficha->nacionalidad }}</td>
                                </tr>
                                <tr>
                                    <th width="30%" class="bg-light">Especifique extranjero</th>
                                    <td>{{ $ficha->especifique_extranjero }}</td>
                                </tr>
                                <tr>
                                    <th width="30%" class="bg-light">Curp</th>
                                    <td>{{ $ficha->curp }}</td>
                                </tr>
                                <tr>
                                    <th width="30%" class="bg-light">Carrera opcion 1</th>
                                    <td>{{ $ficha->carrera_opcion_1 }}</td>
                                </tr>
                                <tr>
                                    <th width="30%" class="bg-light">Carrera opcion 2</th>
                                    <td>{{ $ficha->carrera_opcion_2 }}</td>
                                </tr>
                                <tr>
                                    <th width="30%" class="bg-light">Entidad federativa prepa</th>
                                    <td>{{ $ficha->entidad_federativa_prepa }}</td>
                                </tr>
                        </tbody>
                    </table>

                    <!-- Botón de eliminar -->
                    <div class="mt-3">
                        <form action="{{ route('Ficha.destroy', $ficha->no_recibo) }}"
                            method="POST"
                            onsubmit="return confirm('¿Está seguro de eliminar esta ficha?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Eliminar ficha
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection