@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Rol</h1>
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="permissions" class="form-label">Permisos</label>
                <select class="form-control" id="permissions" name="permissions[]" multiple required>
                    @foreach ($permissions as $permission)
                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
