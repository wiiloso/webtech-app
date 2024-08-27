<x-master-layout>
    <div class="header">
        <h1 class="header-title">
            Crear cliente
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Menu Principal</a></li>
                <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Lista de clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Crear cliente</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 col-lg">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Nuevo cliente</h2>
                </div>
                <form action="{{ route('clientes.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="cedula" name="cedula"
                                placeholder="Ingrese su número de cedula">
                            <label for="cedula">Número de cedula</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                placeholder="name@example.com">
                            <label for="nombre">Nombres</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="apellido" name="apellido"
                                placeholder="name@example.com">
                            <label for="apellido">Apellidos</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="name@example.com">
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="telefono" name="telefono"
                                placeholder="name@example.com">
                            <label for="telefono">Telefono</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="direccion" name="direccion"
                                placeholder="name@example.com">
                            <label for="direccion">Direccion</label>
                        </div>
                    </div>
                    <div class="footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-secondary">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-master-layout>
