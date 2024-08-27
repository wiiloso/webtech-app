<x-master-layout>
    <div class="header">
        <h1 class="header-title">
            Lista de clientes
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Menu Principal</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lista de Clientes</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-outline-primary btn-lg" href="{{ route('clientes.create') }}">Agregar
                        Cliente<i class="align-middle fas fa-fw fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <table id="datatables-reponsive" class="table table-bordered table-striped table-sm"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Cedula</th>
                                <th>Correo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->nombre }}</td>
                                    <td>{{ $cliente->apellido }}</td>
                                    <td>{{ $cliente->cedula }}</td>
                                    <td>{{ $cliente->email }}</td>

                                    <td class="table-action">
                                        <a href="{{ route('clientes.edit', $cliente) }}"><i
                                                class="align-middle fas fa-fw fa-pen text-success"></i></i></a>
                                        <a href="{{ route('clientes.destroy', $cliente) }}"><i
                                                class="align-middle fas fa-fw fa-trash text-danger"></i></a>
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
