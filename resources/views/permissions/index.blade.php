<x-master-layout>
    <div class="header">
        <h1 class="header-title">
            WebTech APP
        </h1>
        <p class="header-subtitle">{{ __('List permissions') }}</p>
    </div>
    <div class="row">
        <div class="container col-6 m-2">
            <h1>Permisos</h1>
            <a href="{{ route('permissions.create') }}" class="btn btn-primary mb-3">Crear Permiso</a>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $permissions->links('vendor.pagination.bootstrap-4') }} <!-- Enlaces de paginación con estilos de Bootstrap 4 -->
        </div>
    </div>
</x-master-layout>
