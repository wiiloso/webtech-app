<x-master-layout>
    <div class="header">
        <h1 class="header-title">
            Editar cliente
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Menu Principal</a></li>
                <li class="breadcrumb-item"><a href="{{ route('clientes.index') }}">Lista de clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar cliente</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 col-lg">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Nuevo cliente</h2>
                </div>
                <form action="{{ route('clientes.update') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="cedula" value="<?php echo $cliente->cedula; ?>">
                            <label for="cedula">Número de cedula</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nombre" value="<?php echo $cliente->nombre; ?>">
                            <label for="nombre">Nombres</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="apellido" value="<?php echo $cliente->apellido; ?>">
                            <label for="apellido">Apellidos</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" value="<?php echo $cliente->email; ?>">
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="telefono" value="<?php echo $cliente->telefono; ?>">
                            <label for="telefono">Telefono</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="direccion" value="<?php echo $cliente->direccion; ?>">
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
