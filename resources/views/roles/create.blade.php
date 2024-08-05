<x-master-layout>
    <div class="header">
        <h1 class="header-title">
            WebTech APP
        </h1>
        <p class="header-subtitle">{{ __('Create role') }}</p>
    </div>
    <div class="row">
        <div class="container col-6 m-2">
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
                <a href="{{ route('roles.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
            </form>
        </div>
    </div>
</x-master-layout>
