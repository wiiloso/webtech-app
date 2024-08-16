<x-master-layout>
  <div class="header">
        <h1 class="header-title">
            Lista de Productos
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Menu Principal</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lista de Productos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-outline-primary btn-lg">Agregar Producto<i class="align-middle fas fa-fw fa-plus"></i></button>
                </div>
                <div class="card-body">
                    <table id="datatables-reponsive" class="table table-bordered table-striped table-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Costo Unitario</th>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ $producto->pro_nombre_producto }}</td>
                                    <td>{{ $producto->pro_cantidad }}</td>
                                    <td>{{ $producto->pro_precio }}</td>
                                    <td>{{ $producto->pro_costo_unitario }}</td>

                                        <td class="table-action">
                                            <a href="#"><i class="align-middle fas fa-fw fa-pen text-success"></i></i></a>
                                            <a href="#"><i class="align-middle fas fa-fw fa-trash text-danger"></i></a>
                                        </td>
                                        {{-- <a href="@" class="btn btn-info">Ver</a>
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