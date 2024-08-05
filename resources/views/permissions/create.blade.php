<x-master-layout>
    <div class="header">
        <h1 class="header-title">
            WebTech APP
        </h1>
        <p class="header-subtitle">{{ __('Create permission') }}</p>
    </div>
    <div class="row">
        <div class="container col-md-6 m-2">
            <h1>Crear Permiso</h1>
            <form action="{{ route('permissions.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('permissions.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
            </form>
        </div>
    </div>
</x-master-layout>
