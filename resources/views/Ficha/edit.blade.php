@extends('layouts.app')

@section('title', 'Editar Ficha')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Editar ficha</h4>
                </div>
                <div class="card-body">

                 <!-- Mostrar errores de validación -->
                 @if($errors->any())
                 <div class="alert alert-danger">
                    <strong>¡Error!</strong> Por favor corrija los siguientes errores:
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                 </div>
                @endif

                 <!-- Formulario -->
                 <form action="{{ route('Ficha.update', $ficha->no_recibo) }}" method="POST">
                    
                    @csrf
                    @method('PUT')

                    <!-- Numero de recibo (Solo lectura) -->
                    <div class="mb-3">
                      <label for="no_recibo" class="form-label">
                        Numero de recibo
                    </label>  
                    <input
                        type="text"
                        class="form-control bg-ligth"
                        id="no_recibo"
                        value="{{ $ficha->no_recibo }}"
                        readonly
                        disabled>
                        <small class="text-muted">La el numero no se puede modificar</small>
                    </div>
                    <!-- Fecha de pago -->
                    <div class="mb-3">
                        <label for="fecha_pago" class="form-label">
                            Fecha de pago <span class="text-danger"></span>
                        </label>
                        <input
                           type="date"
                           class="form-control @error('fecha_pago') is-invalid @enderror"
                           id="fecha_pago"
                           name="fecha_pago"
                           value="{{ old('fecha_pago', $ficha->fecha_pago->format('Y-m-d')) }}"
                           required>
                           @error('fecha_pago')
                           <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                    </div>
                    <!-- Fecha de registro -->
                    <div class="mb-3">
                        <label for="fecha_registro" class="form-label">
                            Fecha de registro <span class="text-danger"></span>
                        </label>
                        <input
                           type="date"
                           class="form-control @error('fecha_registro') is-invalid @enderror"
                           id="fecha_registro"
                           name="fecha_registro"
                           value="{{ old('fecha_registro', $ficha->fecha_registro->format('Y-m-d')) }}"
                           required>
                           @error('fecha_registro')
                           <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                    </div>
                    <!-- Instituto -->
                    <div class="mb-3">
                        <label for="instituto" class="form-label">
                            Instituto <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="text" 
                            class="form-control @error('instituto') is-invalid @enderror" 
                            id="instituto" 
                            name="instituto" 
                            value="{{ old('instituto', $ficha->instituto) }}"
                            required>
                        @error('instituto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Apellido paterno -->
                    <div class="mb-3">
                        <label for="apellido_paterno" class="form-label">
                            Apellido paterno <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="text" 
                            class="form-control @error('apellido_paterno') is-invalid @enderror" 
                            id="apellido_paterno" 
                            name="apellido_paterno" 
                            value="{{ old('apellido_paterno', $ficha->apellido_paterno) }}"
                            required>
                        @error('apellido_paterno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Apellido materno -->
                    <div class="mb-3">
                        <label for="apellido_materno" class="form-label">
                            Apellido materno <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="text" 
                            class="form-control @error('apellido_materno') is-invalid @enderror" 
                            id="apellido_materno" 
                            name="apellido_materno" 
                            value="{{ old('apellido_materno', $ficha->apellido_materno) }}"
                            required>
                        @error('apellido_materno')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Nombre del aspirante -->
                    <div class="mb-3">
                        <label for="nombre_aspirante" class="form-label">
                            Nombre del aspirante <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="text" 
                            class="form-control @error('nombre_aspirante') is-invalid @enderror" 
                            id="nombre_aspirante" 
                            name="nombre_aspirante" 
                            value="{{ old('nombre_aspirante', $ficha->nombre_aspirante) }}"
                            required>
                        @error('nombre_aspirante')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Nip -->
                    <div class="mb-3">
                        <label for="nip" class="form-label">
                            Nip <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="text" 
                            class="form-control @error('nip') is-invalid @enderror" 
                            id="nip" 
                            name="nip" 
                            value="{{ old('nip', $ficha->nip) }}"
                            required>
                        @error('nip')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Fecha de nacimiento -->
                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">
                            Fecha de nacimiento <span class="text-danger"></span>
                        </label>
                        <input
                           type="date"
                           class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                           id="fecha_nacimiento"
                           name="fecha_nacimiento"
                           value="{{ old('fecha_nacimiento', $ficha->fecha_nacimiento->format('Y-m-d')) }}"
                           required>
                           @error('fecha_nacimiento')
                           <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                    </div>
                    <!-- Sexo -->
                    <div class="mb-3">
                        <label for="sexo" class="form-label">
                           Genero <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="text" 
                            class="form-control @error('sexo') is-invalid @enderror" 
                            id="sexo" 
                            name="sexo" 
                            value="{{ old('sexo', $ficha->sexo) }}"
                            required>
                        @error('sexo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Nacionalidad -->
                    <div class="mb-3">
                        <label for="nacionalidad" class="form-label">
                           Nacionalidad <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="text" 
                            class="form-control @error('nacionalidad') is-invalid @enderror" 
                            id="nacionalidad" 
                            name="nacionalidad" 
                            value="{{ old('nacionalidad', $ficha->nacionalidad) }}"
                            required>
                        @error('nacionalidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Especifique extranjero -->
                    <div class="mb-3">
                        <label for="especifique_extranjero" class="form-label">
                           Especifique extranjero <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="text" 
                            class="form-control @error('especifique_extranjero') is-invalid @enderror" 
                            id="especifique_extranjero" 
                            name="especifique_extranjero" 
                            value="{{ old('especifique_extranjero', $ficha->especifique_extranjero) }}"
                            required>
                        @error('especifique_extranjero')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Curp -->
                    <div class="mb-3">
                        <label for="curp" class="form-label">
                           Curp <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="text" 
                            class="form-control @error('curp') is-invalid @enderror" 
                            id="curp" 
                            name="curp" 
                            value="{{ old('curp', $ficha->curp) }}"
                            required>
                        @error('curp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Opcion de carrera 1 -->
                    <div class="mb-3">
                        <label for="carrera_opcion_1" class="form-label">
                           Opcion de carrera 1 <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="text" 
                            class="form-control @error('carrera_opcion_1') is-invalid @enderror" 
                            id="carrera_opcion_1" 
                            name="carrera_opcion_1" 
                            value="{{ old('carrera_opcion_1', $ficha->carrera_opcion_1) }}"
                            required>
                        @error('carrera_opcion_1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Opcion de carrera 2 -->
                    <div class="mb-3">
                        <label for="carrera_opcion_2" class="form-label">
                           Opcion de carrera 2 <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="text" 
                            class="form-control @error('carrera_opcion_2') is-invalid @enderror" 
                            id="carrera_opcion_2" 
                            name="carrera_opcion_2" 
                            value="{{ old('carrera_opcion_2', $ficha->carrera_opcion_2) }}"
                            required>
                        @error('carrera_opcion_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Entidad federativa prepa -->
                    <div class="mb-3">
                        <label for="entidad_federativa_prepa" class="form-label">
                           Entidad federativa prepa <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="text" 
                            class="form-control @error('entidad_federativa_prepa') is-invalid @enderror" 
                            id="entidad_federativa_prepa" 
                            name="entidad_federativa_prepa" 
                            value="{{ old('entidad_federativa_prepa', $ficha->entidad_federativa_prepa) }}"
                            required>
                        @error('entidad_federativa_prepa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                   
                    <!-- Información adicional -->

                    <!-- Botones -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('Ficha.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-save"></i> Actualizar Ficha
                        </button>
                    </div>
                 </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection