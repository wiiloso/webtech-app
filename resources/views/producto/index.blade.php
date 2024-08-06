<x-master-layout>
    {{-- <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Listado de productos</h1>
                <a href="{{ route('productos.create') }}" class="btn btn-primary">Crear producto</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <td>{{ $producto->id }}</td>
                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->descripcion }}</td>
                                <td>{{ $producto->precio }}</td>
                                <td>
                                    <a href="{{ route('productos.show', $producto) }}" class="btn btn-info">Ver</a>
                                    <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}

    <div class="header">
        <h1 class="header-title">
            Lista de Productos
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard-default.html">Menu Principal</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lista de Productos</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Responsive DataTables</h5>
                    <h6 class="card-subtitle text-muted">Highly flexible tool that many advanced features to any HTML table. See official
                        documentation <a href="https://datatables.net/extensions/responsive/" target="_blank"
                            rel="noopener noreferrer nofollow">here</a>.</h6>
                </div>
                <div class="card-body">
                    <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>detalle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ $producto->pro_nombre }}</td>
                                    <td>{{ $producto->pro_detalle }}</td>
                                    {{-- <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->descripcion }}</td>
                                    <td>{{ $producto->precio }}</td> --}}
                                    <td>
                                        {{-- <a href="{{ route('productos.show', $producto) }}" class="btn btn-info">Ver</a>
                                        <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning">Editar</a>
                                        <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form> --}}
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

