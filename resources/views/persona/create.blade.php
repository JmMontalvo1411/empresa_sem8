@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Crear Persona</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('persona.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="cPerApellido" class="form-label">Apellido</label>
            <input type="text" name="cPerApellido" class="form-control" value="{{ old('cPerApellido') }}">
            @error('cPerApellido')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cPerNombre" class="form-label">Nombre</label>
            <input type="text" name="cPerNombre" class="form-control" value="{{ old('cPerNombre') }}">
            @error('cPerNombre')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cPerDireccion" class="form-label">Dirección</label>
            <input type="text" name="cPerDireccion" class="form-control" value="{{ old('cPerDireccion') }}">
            @error('cPerDireccion')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="dPerFechaNac" class="form-label">Fecha de Nacimiento</label>
            <input type="date" name="dPerFechaNac" class="form-control" value="{{ old('dPerFechaNac') }}">
            @error('dPerFechaNac')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nPerEdad" class="form-label">Edad</label>
            <input type="number" name="nPerEdad" class="form-control" value="{{ old('nPerEdad') }}">
            @error('nPerEdad')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nPerSueldo" class="form-label">Sueldo</label>
            <input type="number" step="0.01" name="nPerSueldo" class="form-control" value="{{ old('nPerSueldo') }}">
            @error('nPerSueldo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nPerEstado" class="form-label">Estado</label>
            <select name="nPerEstado" class="form-select">
                <option value="1" {{ old('nPerEstado') == '1' ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('nPerEstado') == '0' ? 'selected' : '' }}>Inactivo</option>
            </select>
            @error('nPerEstado')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
