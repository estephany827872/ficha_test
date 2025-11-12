@extends('layouts.app')

@section('title', 'Nueva Ficha')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Nueva Ficha</h4>
                </div>
                <div class="card-body">

                    <!--Mostrar errores de validacion-->
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <strong>¡Error!</</strong> Por favor corrija los siguientes errores:
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>  
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Formulario -->
                    <form action="{{ route('Ficha.store') }}" method="POST">
                        @csrf
                        
                        <!-- Numero recibo -->
                        <div class="mb-3">
                            <label for="no_recibo" class="form-label">
                                Numero de recibo <span class="text-danger">*</span>
                            </label>
                            <input
                            type="text"
                            class="form-control @error('no_recibo') is-invalid @enderror"
                            id="no_recibo"
                            name="no_recibo"
                            value="{{ old('no_recibo') }}"
                            placeholder="Ej: 123456"
                            required>
                            @error('no_recibo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> 
                      <!-- Fecha pago --> 
                      <div class="mb-3">
                        <label for="fecha_pago" class="form-label">
                            Fecha de pago <span class="text-danger">*</span>
                        </label>
                        <input
                        type="date"
                        class="form-control @error('fecha_pago') is-invalid @enderror"
                        id="fecha_pago"
                        name="fecha_pago"
                        value="{{ old('fecha_pago') }}"
                        required>
                        @error('fecha_pago')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror 
                      </div>
                      <!--Fecha registro-->
                      <div class="mb-3">
                        <label for="fecha_registro" class="form-label">
                            Fecha de registro <span class="text-danger">*</span>
                        </label>
                        <input
                        type="date"
                        class="form-control" @error('fecha_registro') is-invalid @enderror"
                        id="fecha_registro"
                        name="fecha_registro"
                        value="{{ old('fecha_registro') }}"
                        required>
                        @error('fecha_registro')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <!--Instituto-->
                      <div class="mb-3">
                        <label for="instituto" class="form-label">
                            Nombre del Instituto <span class="text-danger">*</span>
                        </label>
                        <input
                        type="text"
                        class="form-control @error('instituto') is-invalid @enderror"
                        id="instituto"
                        name="instituto"
                        value="{{ old('instituto') }}"
                        placeholder="Ej: Instituto Tecnologico de Cd. Altamirano"
                        required>
                        @error('instituto')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <!--Apellido paterno-->
                      <div class="mb-3">
                        <label for="apellido_paterno" class="form-label">
                            Apellido paterno <span class="text-danger">*</span>
                        </label>
                        <input
                        type="text"
                        class="form-control @error('apellido_paterno') is-invalid @enderror"
                        id="apellido_paterno"
                        name="apellido_paterno"
                        value="{{ old('apellido_paterno') }}"
                        required>
                        @error('apellido_paterno')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <!--Apellido materno-->
                      <div class="mb-3">
                        <label for="apellido_materno" class="form-label">
                            Apellido materno <span class="text-danger">*</span>
                        </label>
                        <input
                        type="text"
                        class="form-control @error('apellido_materno') is-invalid @enderror"
                        id="apellido_materno"
                        name="apellido_materno"
                        value="{{ old('apellido_materno') }}"
                        required>
                        @error('apellido_materno')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <!--Nombre aspirante-->
                      <div class="mb-3">
                        <label for="nombre_aspirante" class="form-label">
                            Nombre del aspirante <span class="text-danger">*</span>
                        </label>
                        <input
                        type="text"
                        class="form-control @error('nombre_aspirante') is-invalid @enderror"
                        id="nombre_aspirante"
                        name="nombre_aspirante"
                        value="{{ old('nombre_aspirante') }}"
                        required>
                        @error('nombre_aspirante')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <!--Nip-->
                      <div class="mb-3">
                        <label for="nip" class="form-label">
                            Nip del aspirante <span class="text-danger">*</span>
                        </label>
                        <input
                        type="text"
                        class="form-control @error('nip') is-invalid @enderror"
                        id="nip"
                        name="nip"
                        value="{{ old('nip') }}"
                        placeholder="Ej: 123456"
                        required>
                        @error('nip')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <!--Fecha nacimiento-->
                      <div class="mb-3">
                        <label for="fecha_nacimiento" class="form-label">
                            Fecha de nacimiento <span class="text-danger">*</span>
                        </label>
                        <input
                        type="date"
                        class="form-control" @error('fecha_nacimiento') is-invalid @enderror"
                        id="fecha_nacimiento"
                        name="fecha_nacimiento"
                        value="{{ old('fecha_nacimiento') }}"
                        required>
                        @error('fecha_nacimiento')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <!--Sexo-->
                      <div class="mb-3">
                        <label for="sexo" class="form-label">
                            Genero <span class="text-danger">*</span>
                        </label>
                        <select
                            class="form-control @error('sexo') is-invalid @enderror"
                            id="sexo"
                            name="sexo"
                            required>
                            <option value="">Seleccione una opción</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Otro">Otro</option>
                        </select>
                        @error('sexo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                      <!--Nacionalidad-->
                      <div class="mb-3">
                        <label for="nacionalidad" class="form-label">
                            Nacionalidad <span class="text-danger">*</span>
                        </label>
                        <select
                            class="form-control @error('nacionalidad') is-invalid @enderror"
                            id="nacionalidad"
                            name="nacionalidad"
                            required>
                            <option value="">Seleccione una opción</option>
                            <option value="Mexicana">Mexicana</option>
                            <option value="Extranjera">Extranjera</option>
                        </select>
                        @error('nacionalidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                      <!--Especifique extranjero-->
                      <div class="mb-3>
                        <label for="especifique_extranjero" class="form-label">
                            Especifique nacionalidad extranjera <span class="text-danger">*</span>
                        </label>
                        <input
                            type="text"
                            class="form-control @error('especifique_extranjero') is-invalid @enderror"
                            id="especifique_extranjero"
                            name="especifique_extranjero"
                            value="{{ old('especifique_extranjero') }}"
                            placeholder="Ej: Estadounidense">
                        @error('especifique_extranjero')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                      <!--Curp-->
                      <div class="mb-3">
                        <label for="curp" class="form-label">
                            Curp del aspirante <span class="text-danger">*</span>
                        </label>
                        <input
                        type="text"
                        class="form-control @error('curp') is-invalid @enderror"
                        id="curp"
                        name="curp"
                        value="{{ old('curp') }}"
                        placeholder="Ej:PERL800101HDFXYZ"
                        required>
                        @error('curp')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <!--Carrera opcion 1-->
                      <div class="row mb-4">
                        <div class="col-md-12">
                            <h3 class="border-bottom pb-2">Opciones de Carrera</h3>
                        </div>
                        
                        <!-- Primera opción de carrera -->
                        <div class="mb-3">
                            <label for="carrera_opcion_1" class="form-label">
                                Primera opción de carrera <span class="text-danger">*</span>
                            </label>
                            <select
                                class="form-control @error('carrera_opcion_1') is-invalid @enderror"
                                id="carrera_opcion_1"
                                name="carrera_opcion_1"
                                required>
                                <option value="">Seleccione una carrera</option>
                                <option value="Ingeniería en informatica">Ingeniería en informatica</option>
                                <option value="Licenciatura en Administración">Licenciatura en Administración</option>
                                <option value="Contador Público">Contador Público</option>
                            </select>
                            @error('carrera_opcion_1')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                      <!--Carrera opcion 2-->
                      <div class="mb-3">
                        <label for="carrera_opcion_2" class="form-label">
                            Segunda opción de carrera <span class="text-danger">*</span>
                        </label>
                        <select
                            class="form-control @error('carrera_opcion_12') is-invalid @enderror"
                            id="carrera_opcion_2"
                            name="carrera_opcion_2"
                            required>
                            <option value="">Seleccione una carrera</option>
                            <option value="Ingeniería en informatica">Ingeniería en informatica</option>
                            <option value="Licenciatura en Administración">Licenciatura en Administración</option>
                            <option value="Contador Público">Contador Público</option>
                        </select>
                        @error('carrera_opcion_2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                      <!--Entidad federativa prepa-->
                      <div class="mb-3">
                        <label for="entidad_federativa_prepa" class="form-label">
                            Entidad federativa de la preparatoria <span class="text-danger">*</span>
                        </label>
                        <select
                            class="form-control @error('entidad_federativa_prepa') is-invalid @enderror"
                            id="entidad_federativa_prepa"
                            name="entidad_federativa_prepa"
                            required>
                            <option value="">Seleccione una entidad</option>
                            <option value="Ciudad de México">Ciudad de México</option>
                            <option value="Coahuila">Coahuila</option>
                            <option value="Colima">Colima</option>
                            <option value="Durango">Durango</option>
                            <option value="Estado de México">Estado de México</option>
                            <option value="Guanajuato">Guanajuato</option>
                            <option value="Guerrero">Guerrero</option>
                            <option value="Michoacán">Michoacán</option>
                            <option value="Morelos">Morelos</option>
                        </select>
                        @error('entidad_federativa_prepa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Botones -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('Ficha.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Guardar Ficha
                        </button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection