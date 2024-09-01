<x-master-layout>
    <div class="header">
        <h1 class="header-title">{{ __('Lista de Roles') }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Menú Principal') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Lista Roles') }}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h1>{{ __('Lista roles') }}</h1> --}}
                </div>
                <div class="card-body">
                    <a href="{{ route('roles.create') }}" class="btn btn-outline-primary btn-lg mb-4">{{ __('Crear Rol') }}<i class="align-middle fas fa-fw fa-plus"></i></a>
                    <table id="datatables-reponsive" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Nombre Rol') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a href="{{ route('roles.edit', $role->id) }}"
                                            class="btn btn-warning">{{ __('Edit') }}</a>
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Datatables Responsive
            $("#datatables-reponsive").DataTable({
                responsive: true
            });
        });
    </script>
</x-master-layout>
