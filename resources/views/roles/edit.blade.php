@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Rol</h1>
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}" required>
            </div>
            <div class="mb-3">
                <label for="permissions" class="form-label">Permisos</label>
                <select class="form-control" id="permissions" name="permissions[]" multiple required>
                    @foreach ($permissions as $permission)
                        <option value="{{ $permission->name }}"
                            {{ in_array($permission->name, $rolePermissions) ? 'selected' : '' }}>
                            {{ $permission->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
